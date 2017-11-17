<?php
 if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {

	public function __construct()
	{
			parent::__construct();//这句话必须加，原因是你的构造函数将会覆盖父类的构造函数，所以我们要手工的调用它。
			$this->load->model('blog_model');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('file');
			$this->load->library('session'); //加载session类库自动开启session
		
				
			//$this->output->cache(1); 					//开启缓存，持续时间1分钟
			// $this->output->enable_profiler(TRUE); 	//启用分析器
	}


	public function index(){
        //防止不经登录直接进入后台主页
		$username=$this->session->userdata('username');
        if(!$username){
            success('home/login','请登录');
            //redirect('home/login');
        }
		$this->load->view('admin/view_admin_index');
	}

	//后台右侧页面的默认显示
	public function copy(){

		//显示后台主页右侧框架页面的主页
    	$this->load->view('admin/view_admin_copy');
	}

	//后台页面中点击“查看文章”
	 public function check_article(){

        //分页-------------------------------------------------
                //载入分页类
                $this->load->library('pagination');
                $perPage=3;
                

                //配置
                $config_page['base_url']=site_url('/admin/check_article');
                $config_page['total_rows']=$this->db->count_all_results('article'); //获取hd_article表中的总行数
                $config_page['per_page']=$perPage;  //设置每个分页显示的行数
                $config_page['uri_segment']=3;  //设置uri第三个字段为使用区间，默认也是3
                $config_page['first_link'] = '第一页';
                $config_page['prev_link'] = '上一页';
                $config_page['next_link'] = '下一页';
                $config_page['last_link'] = '最后一页';

               


                //$config_page['use_page_numbers'] = TRUE;    //设置为TRUE则URL中第三段的数字为页数，但这里改的话，下面的$offset也要改，不然每页查询间隔就是1

                //载入配置
                $this->pagination->initialize($config_page);

                //创建分页，把分列链接存入$data['links']并传入check_article.html页面，打印$links就能打印出分页链接
                $data['links']=$this->pagination->create_links();

                //设置一个变量$offset等于uri的第三个字段
                $offset=$this->uri->segment(3);

                //对数据库中查询数据进行限制，第一个参数是结果的显示行数，第二个参数是 Number of rows to skip
                $this->db->limit($perPage,$offset);
        
        //查询数据库中的文章数据
        $data['article']=$this->blog_model->get_article2();


        //$data数据包含$data['links']和$data['article']
        $this->load->view('admin/view_admin_check_article',$data);

    }

    //后台页面中点击"发表文章”
    public function add_article(){

        $data['category']=$this->blog_model->get_category2();
        
        $this->load->view('admin/view_admin_add_article',$data);
    }

    //发表文章点“提交”所执行的动作
    public function add_article_action(){
        //文件上传----------------------------------------------------
                //配置文件上传类
                $config['upload_path'] = './assets/i/'; //这个目录一定要先手动创建好
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['file_name'] = time().mt_rand(1000,9999); //设置保存的文件名为一个随机名字

                //加载文件上传类库，并载入配置
                $this->load->library('upload',$config);

                //执行上传，并根据成功与否返回布尔值给$flag
                //do_upload方法根据设置的参数上传文件，默认情况下上传文件是来自于表单的 userfile 字段
                //表单属性里一定要有enctype="multipart/form-data"
                $flag=$this->upload->do_upload('picture');    //  picture标示提交的表单中的具体哪个


                if(!$flag){
                    error('必须上传图片');
                }
                //如果上传有错误则弹窗提示错误
                $wrong=$this->upload->display_errors();
                if($wrong){
                    error($wrong);
                }
                //返回信息,$info['full_path']是文件上传路径且包含保存的文件名
                $info=$this->upload->data();
                
                //往数据库中存数据
                //不同的数据存不同的表，$data1存article表，$data2存article_content表
                //注意，都没有存aid，两张表的aid都设置的自增！所以一定要检查两个表自增的aid是一样的，否则会有重大错误！！
                $data1=array(
                    'title'=>$this->input->post('title'),
                    'type'=>$this->input->post('type'),
                    'time'=>date('Y-m-d H:i:s'),    ////取得当前时间
                    'author'=>'Js'
                    );

                $data2=array(
                    'content'=>$this->input->post('content'),
                    'picture'=>$info['file_name']   ////往数据库中thumb存入的数据是上传图片的保存文件名
                    );

                $this->blog_model->add_article($data1);
                $this->blog_model->add_article_content($data2);


                $this->check_article();

                
    }

    //查看文章时点击“编辑”
    public function edit_article($aid){

        //根据传过来的aid获取文章的所有信息
        $data['article']=$this->blog_model->get_article_by_aid($aid);
        
        
        $this->load->view('admin/view_admin_edit_article',$data);

    }

    //编辑文章点击“提交”所执行的动作
    public function edit_article_action(){

        $data=array(
            'aid'=>$this->input->post('aid'),
            'content'=>$this->input->post('content'),
            'title'=>$this->input->post('title'),
            'time'=>date('Y-m-d H:i:s'),    ////取得当前时间
            );

        //修改数据库中的内容
        $this->blog_model->edit_article($data);


        success('admin/check_article','修改成功！');
        //$this->check_article();
        

    }

    //查看文章时点击“删除”
    public function delete_article($aid){
        
        $this->blog_model->delete_article($aid);
        $this->check_article();

    }


    //查看栏目
	 public function check_category(){
        
        //查询数据库中的文章数据
        $data['category']=$this->blog_model->get_category2();


        
        $this->load->view('admin/view_admin_check_category',$data);

    }

    //查看栏目时点击“编辑”
    public function edit_category($cname){
        $data['category']=array('cname'=>$cname);

        $this->load->view('admin/view_admin_edit_category',$data);
    }

    //查看栏目时点击“编辑”之后确认修改栏目名称时的操作
    public function edit_category_action(){
        $data=array(
            'old_type'=>$this->input->post('old_type'),
            'new_type'=>$this->input->post('new_type'));
        $this->blog_model->edit_category($data);

        success('admin/check_category','修改成功！');
        //$this->check_category();
    }

    //查看栏目时点击“删除”
    public function delete_category($cid){
        
        $this->blog_model->delete_category($cid);
        $this->check_category();

    }

    //添加栏目
    public function add_category(){
    	$this->load->view('admin/view_admin_add_category');
    }

    //添加栏目的执行动作
    public function add_category_action(){
    	$data=array('type'=>$this->input->post('name'));
    	
    	$this->blog_model->add_category($data);

    	$this->check_category();
    }  

    //显示留言的信息
    public function message_display(){

        $data['message']=$this->blog_model->message_display();

        $this->load->view('home/view_message_display',$data);
    }

    //显示访客记录
    public function ip_display(){

        $data['ip']=$this->blog_model->ip_display();

        $this->load->view('admin/view_admin_ip_display',$data);
    }  

	public function test()
	{
		echo site_url();
		echo base_url();
		die;
	}
}