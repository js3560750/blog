<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();//这句话必须加，原因是你的构造函数将会覆盖父类的构造函数，所以我们要手工的调用它。
			$this->load->model('blog_model');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('file');
			$this->load->library('pagination');//加载分页
			$this->load->library('session'); //加载session类库自动开启session
			$this->load->helper('security');	//防御XSS攻击
		
				
			//$this->output->cache(1); 					//开启缓存，持续时间1分钟
			// $this->output->enable_profiler(TRUE); 	//启用分析器
	}

	public function test(){
		echo base_url('assets/css/amazeui.min.css');
	}


	//前台主页
	public function index()
	{
		//获取分类
		//必须要写在分页设置前面，否则会限制查询数量！！！！！
		$data['category']=$this->blog_model->get_category();

		//获取点赞数据
		$data['like_number']=$this->blog_model->get_like_number();
		
		//存储访客的IP地址
		$data['ip']=array(
			'ip'=>$this->input->ip_address(),
			'time'=>date('Y-m-d H:i:s')
		);
		$this->blog_model->save_ip($data['ip']);
		

		$this->load->view('home/view_index',$data);
	}

	//前台点击"Articles"
	public function blog()
	{

		//获取分类
		//必须要写在分页设置前面，否则会限制查询数量！！！！！
		$data['category']=$this->blog_model->get_category();



			//分页设置
						$per_page=7; //设置每页显示

						$msg='/home/blog';//设置切换页面时调用函数路径

						//加载分页逻辑设置
						$this->pagination->initialize($this->page_set($per_page,$msg));

						//加载分页样式
						$this->pagination->initialize($this->page_css());
						
						$data['page']=$this->pagination->create_links();

						//设置一个变量$offset等于uri的第三个字段
			            $offset=$this->uri->segment(3);

			            //对数据库中查询数据进行限制，第一个参数是结果的显示行数，第二个参数是 Number of rows to skip
			            $this->db->limit($per_page,$offset);
						

		


		//获取左侧展示文章的详细数据
		$data['articles']=$this->blog_model->get_article();
		
		

		//获取右侧最新文章的数据
		//从数据库中获得文章title和aid,传入的6表示只取6个数据
		$data['latest_title']=$this->blog_model->title(6);
		
		$this->load->view('home/view_blog',$data);
	}

	//前台点击分类栏目，根据不同栏目显示不同类型的文字，和blog()函数唯一的区别是，blog()内显示全部文章，这里只显示单一类型的文章
	public function category_article($category){

		

		//获取分类
		//必须要写在分页设置前面，否则会限制查询数量！！！！！
		$data['category']=$this->blog_model->get_category();
		
		
		/*分页的功能可以使用，但是有点小Bug!!!!切换分页时，标签永远显示的是第一页！！！！*/
			//分页设置
						$per_page=3; //设置每页显示

						$msg='/Home/category_article/'.$category;//设置切换页面时调用函数路径

						//加载分页逻辑设置
			$config['base_url'] = site_url($msg);
			$config['total_rows'] = $this->db->count_all_results('article');	//直接查询数据库中article表的总行数
			$config['per_page'] = $per_page;
			$config['num_links'] = 2; //放在你当前页码的前面和后面的“数字”链接的数量
			$config['uri_segment']=4;  //设置uri第三个字段为使用区间，默认也是3
			$config['first_link'] = '第一页';
			$config['prev_link'] = '上一页';
			$config['next_link'] = '下一页';
			$config['last_link'] = '最后一页';
						$this->pagination->initialize($config);

						//加载分页样式
						$this->pagination->initialize($this->page_css());
						
						$data['page']=$this->pagination->create_links();

						//设置一个变量$offset等于uri的第三个字段
			            $offset=$this->uri->segment(4);

			            //对数据库中查询数据进行限制，第一个参数是结果的显示行数，第二个参数是 Number of rows to skip
			            $this->db->limit($per_page,$offset);
		
	
		
		
						

		/*--------根据文章类型来查询----------------*/            
		//获取左侧展示文章的详细数据
		$data['articles']=$this->blog_model->get_article_category($category);
		
		
		

		//获取右侧最新文章的数据
		//从数据库中获得文章title和aid,传入的6表示只取6个数据
		$data['latest_title']=$this->blog_model->title(6);
		
		$this->load->view('home/view_blog_category',$data);
	}


	//前台点击登录
	public function login()
	{
		$this->load->view('home/view_login');
	}

	//前台登录页面进行验证
	public function login_check()
	{
			//获取用户输入
			$data=array(
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password')
			);



			if($this->blog_model->admin_id_check($data))
			{
				if($this->blog_model->admin_password_check($data))
				{
					//管理员登录成功

					//记录管理员的信息到session中，并在后台主页控制器验证是否存在这些信息，防止不经登录访问后台
					if(!isset($_SESSION)){
    					session_start();
    				}
    				//配置
    				$session_data=array(
    					'username'=>$this->input->post('email'),
    					'logintime'=>date('Y-m-d H:i:s')
    				);
    				//存入session类
    				$this->session->set_userdata($session_data);

					$this->load->view('admin/view_admin_index');	
					
				}
				else
				{
					success('Home/login','密码错误');
				}
			}
			else
			{
				success('Home/login','账号错误');
			}
	}

	//前台页面点击注册
	public function register()
	{
		$this->load->view('home/view_register');
	}

	//前台页面点击Only For XiaoLiMao
	public function love(){

		$time1=date('Y-m-d');
		$time2='2016-12-23';
		$d1=strtotime($time1);
		$d2=strtotime($time2);
		$days=round(($d1-$d2)/3600/24);

		$data['time']=array('day'=>$days);

		
		$this->load->view('home/view_love',$data);
	}

	//前台页面点击like+,点赞功能
	public function like(){

		//将数据库中like数+1
		$this->blog_model->add_like_number();

		success('Home/index','谢谢您的点赞！');
		//error('谢谢您的点赞！');

	}

	//前台留言,，前台主页最下方点击“Submit”
	public function message()
	{
			//加载辅助函数
			$this->load->library('form_validation');

			//用户输入规则验证
			//trim去掉用户输入两边的空格，required表示必须有输入不能为Null,min_length表示最小长度,matches表示相等
			//is_unique[table.field] 如果表单元素值在指定的表和字段中并不唯一，返回 FALSE ,直接用，只要连接了数据库行
			$this->form_validation->set_rules('name','名字','trim|required',array('required' => '您的名字不能为空噢~'));
			$this->form_validation->set_rules('message','留言信息','trim|required|max_length[255]',array('required'=>'您的留言不能为空噢~','max_length'=>'太长啦，留言只能在255个字以内噢~'));

			

		//规则验证都通过则$this->form_validation->run()返回真
		if($this->form_validation->run()==FALSE)
		{
			//若规则验证不通过则留在该页面
			error('抱歉，名字和内容不能为空');
			
		}
		else{

			$data = array(
			'name' =>$this->input->post('name') ,
			'email'=>$this->input->post('email') ,
			'message'=>$this->input->post('message')
			);
			
			//对数据进行XSS过滤
			$data=$this->security->xss_clean($data);
			
			$this->blog_model->set_message($data);
			$this->load->view('home/view_message_success');
		}
		

	}


	//前台点进具体的某个文章
	public function article($aid){
		

		//获取分类
		//必须要写在分页设置前面，否则会限制查询数量！！！！！
		$data['category']=$this->blog_model->get_category();

		//获取单个文章详细内容
		$data['article']=$this->blog_model->get_article_by_aid($aid);

		//获取最近7个文章标题
		$data['article_title']=$this->blog_model->get_article_title();

		

		$this->load->view('home/view_article',$data);
	}


	//前台点击搜索文章，根据传递过来的关键字（不区分大小写）搜索文章
	public function search_article(){

		$a=$this->input->post('text');



		$data['search_article']=$this->blog_model->search_article($a);
		if($data['search_article']==FALSE){
			$data['error']='抱歉，暂时没有您要找的文章，您可以试着搜索下java';
		}

		$this->load->view('home/view_search_article',$data);
	}

	//显示留言的信息
	public function message_display(){

		$data['message']=$this->blog_model->message_display();

		$this->load->view('home/view_message_display',$data);
	}

	


		/*-----------------------------------自定义函数-------------------------------*/



		//单独设置分页逻辑部分以便在控制器中多次调用
		//$per_page是每页显示信息数目
		//$msg是调用的控制器函数地址
	    private function page_set($per_page,$msg){

	    	$config['base_url'] = site_url($msg);
			$config['total_rows'] = $this->db->count_all_results('article');	//直接查询数据库中article表的总行数
			$config['per_page'] = $per_page;
			$config['num_links'] = 2; //放在你当前页码的前面和后面的“数字”链接的数量
			$config['uri_segment']=3;  //设置uri第三个字段为使用区间，默认也是3
			$config['first_link'] = '第一页';
			$config['prev_link'] = '上一页';
			$config['next_link'] = '下一页';
			$config['last_link'] = '最后一页';

			return $config;

	    }
		

		//单独设置分页样式函数以便在控制器中多次调用
		private function page_css(){
			//设置分页样式
			$config['full_tag_open'] = '<ul class="am-pagination am-pagination-centered">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = '首页';
			$config['first_tag_open'] = '<li class="">';//“第一页”链接的打开标签。
			$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
			$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
			$config['last_tag_open'] = '<li class="">';//“最后一页”链接的打开标签。
			$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
			$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
			$config['next_tag_open'] = '<li class="">';//“下一页”链接的打开标签。
			$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
			$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
			$config['prev_tag_open'] = '<li class="">';//“上一页”链接的打开标签。
			$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
			$config['cur_tag_open'] = '<li class="am-active"><a>';//“当前页”链接的打开标签。
			$config['cur_tag_close'] = '</a></li>';//“当前页”链接的关闭标签。
			$config['num_tag_open'] = '<li class="">';//“数字”链接的打开标签。
			$config['num_tag_close'] = '</li>';

			return $config;
		}
}