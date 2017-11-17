<?php
	class Blog_model extends CI_Model{
		
		public function __construct()
		{
			$this->load->database(); //加载数据库，已经在database.php文件中配置默认的数据库为myblog
		}

		/*----------------------------------------------------------------------------------------*/
 		/*----------------                      前台调用函数                   --------------------*/
 		/*----------------------------------------------------------------------------------------*/

		//前台首页上的留言存入数据库
		public function set_message($a)
		{
			$this->db->insert('message',$a);

		}

		//前台访客IP存入数据库
		public function save_ip($a)
		{
			$this->db->insert('ip',$a);
		}

		//管理员登录时验证email也就是id
		function admin_id_check($a)
		{
			$query=$this->db->get('admin');
			
			foreach ($query->result_array() as $row)
			{
				if($a['email']==$row['email'])
				{
					return true;
				}
				
			}
			return false;
		}
		
		//管理员登录时验证password
		function admin_password_check($a)
		{
			$query=$this->db->query("SELECT password FROM admin;");
			foreach ($query->result_array() as $row)
			{
				if($a['password']==$row['password'])
				{
					return true;
				}
			}
			return false;
		}

		/**
 	 	* 在前台首页中展示文章
 		 */

 		public function get_article(){
 			

 			//查询所有文章详细数据
 			//这里做了一个联合查询，从article表中获取所有数据，并根据article表的aid获取article_content表中的content和picture数据
 			//substr(content,1,100)规定了获得content从第一个字符到第100个字符的结果，放在主页当摘要用
 			$data=$this->db->select('*,content,picture')->from('article')->order_by('time','desc')->join('article_content','article.aid=article_content.aid')->get()->result_array();
 			//p($data);
 			//die;
 			return $data;
 		}

 		//前台首页中获得Like+数据
 		public function get_like_number(){
 			return $this->db->select('number')->from('like_number')->get()->result_array();
 		}

 		//前台首页中Like数据+1
 		public function add_like_number(){
 			 $this->db->query("UPDATE like_number SET number = number+1");
 		}

 		//根据文章类型来获取前台展示文章
 		public function get_article_category($category){
 			//注意这里不能用get_where！！！！只能先写where再用get

 			$data=$this->db->select('*,content,picture')->from('article')->order_by('time','desc')->join('article_content','article.aid=article_content.aid')->where(array('type'=>$category))->get()->result_array();
 			
 			
 			return $data;

 		}

		/**
 	 	* 前台首页中右侧文章标题调取
 	 	*/
 		public function title($limit){
 			return $this->db->select('title,aid')->order_by('time','desc')->limit($limit)->get('article')->result_array();
 		}

 		

 		//前台Category分类栏目的获取
 		public function get_category(){
 			return $this->db->select('type')->from('category')->get()->result_array();
 		}


 		//前台具体文章显示页面，根据aid查询某个文章详细数据
 		public function get_article_by_aid($aid){
 			

 			//根据aid查询某个文章详细数据
 			//这里做了一个联合查询，从article表中获取所有数据，并根据article表的aid获取article_content表中的content和picture数据
 			//注意因为表article和表article_content都有aid，所以在WHERE语句中要注明具体是哪个aid
 			$data=$this->db->select('*,content,picture')->from('article')->join('article_content','article.aid=article_content.aid')->where('article.aid',$aid)->get()->result_array();
 			
 			return $data;
 		}

 		//前台具体文章显示页面，获得最近7篇文章标题
 		public function get_article_title(){

 			return $this->db->select('aid,title,time')->from('article')->order_by('time','desc')->limit('7')->get()->result_array();
 		}

 		//前台根据输入的关键字搜索标题包含该关键字的文章
 		public function search_article($a){

 			//这里的Like()函数是关键，第一个参数是字段名，第二个参数是要包含的关键字,该关键字不区分大小写
 			//只要包含该关键字的数据都会返回
 			$data= $this->db->select('*')->from('article')->order_by('time','desc')->like('title',$a)->get()->result_array();
 			return $data;
 		}

 		//前台显示留言信息
 		public function message_display(){

 			return $this->db->select('*')->from('message')->get()->result_array();
 		}

 		/*----------------------------------------------------------------------------------------*/
 		/*----------------                      后台调用函数                   --------------------*/
 		/*----------------------------------------------------------------------------------------*/


 		//获取文章除了内容、图片的其他所有数据
 		public function get_article2(){
 			

 			//查询所有文章详细数据
 			//这里做了一个联合查询，从article表中获取所有数据，并根据article表的aid获取article_content表中的content和picture数据
 			//substr(content,1,100)规定了获得content从第一个字符到第100个字符的结果，放在主页当摘要用
 			$data=$this->db->select('*')->from('article')->order_by('time','desc')->get()->result_array();
 			return $data;
 		}

 		//后台删除文章，根据aid
 		public function delete_article($aid){
 			//注意要删除两个表
 			$this->db->delete('article',array('aid'=>$aid));
 			$this->db->delete('article_content',array('aid'=>$aid));
 		}

 		//后台发表、添加文章add_article和add_article_content总是一起调用的
 		public function add_article($a){

 			$this->db->insert('article',$a);
 		}

 		public function add_article_content($a){

 			$this->db->insert('article_content',$a);
 		}


 		//后台编辑文章！！！
 		public function edit_article($a){
 			
 			//注意要修改两个表
 			//并且$data1和$data2中不能存放进行对比的aid，否则报错
 			$data1=array(
 				'title'=>$a['title'],
 				'time'=>$a['time']
 				);

 			$data2=array(
 				'content'=>$a['content']
 				);

 			$this->db->update('article',$data1,array('aid'=>$a['aid']));
 			$this->db->update('article_content',$data2,array('aid'=>$a['aid']));
 		}

 		//后台Category分类栏目的获取
 		public function get_category2(){
 			return $this->db->select('*')->from('category')->get()->result_array();
 		}

 		//后台添加栏目
 		public function add_category($a){
 			
 			$this->db->insert('category',$a);
 		}

 		//后台删除栏目，根据cid
 		public function delete_category($cid){
 			$this->db->delete('category',array('cid'=>$cid));
 		}

 		//后台编辑栏目
 		public function edit_category($a){

 			$data=array('type'=>$a['new_type']);	//这里的$data['type']=new_type的值，$data的键名要与数据库中的字段名相一致

 			//更改数据库中数据，将category表中符合type=$a['old_type']的数据更新为$data
 			$this->db->update('category',$data,array('type'=>$a['old_type']));

 			$this->db->update('article',$data,array('type'=>$a['old_type']));
 		}

 		//后台获取访问IP数据
 		public function ip_display(){

 			return $this->db->select('*')->from('ip')->order_by('time','desc')->limit('30')->get()->result_array();
 		}
	}