<?php
class Users extends Model{
    private $_isLoggedIn,$sessionName, $_cookieName;
    public static $currentLoggedInUser = null;

    public function __construct($user = ''){
        $table = 'users';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_sofDelete = true;//we dont want to permanently delete a user
        //were are goint to use boolens
        if($user != ''){
            if(is_int($user)){
                $u = $this->_db->findFirst('users',['conditions'=>'id= ?','bind'=>[user]]);
            }else{
                $u = $this->_db->findFirst('users',['conditions'=>'username = ?','bind' =>[$user]]);
            }
            foreach($u as $key => $val ){
                $this->$key = $val;
            }
        }

    }  


    public function findByUsername($username){
        return $this->findFirst(['conditions' =>"username = ?",'bind'=>[$username]]);
    }
    public function login($rememberMe=false){
        Sessiion::set($this->sessionName,$this->id);
        if($rememberMe){
            $hash =md5(uniqid() + rand(0,100));
            $user_agent = Session::uagent_no_version();
            Cookie::set($this->_cookieName,$hash,REMEMBER_COOKIE_EXPIRITY);
            $fields = ['session'=>$hash, 'user_agent'=>$user_agent,'user_id'=>$this->id];
            $this->_db->query("DELETE FROM user_sessions WHER user_id = ? AND user_agnt = ?",[$this->id,$user_agent]);
            $this->_db->insert('user_sessions',$fields);
        }
    }
}