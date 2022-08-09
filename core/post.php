<?php 

class post {

    //database stuff here 
    private $conn ;
    private $table ='post';

    //table properties

    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $aurthor;
    public $create_at;
    public $mrow;
    public $count;

    //constructor with db connection

    public function __construct($db){
        $this->conn = $db;

    }

//getting posts from database
    public function read(){
        //create querry
        $querry = "SELECT c.name as category_name,p.id,p.category_id,p.title,p.body,p.aurthor,p.created_at FROM ".$this->table. " p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC";
        //prpare statement
        $stmt = $this->conn->prepare($querry);
        //execute querry
        $stmt->execute();
        return $stmt;
    }
    //getting single post from database
    public function read_single(){

        $querry = "SELECT c.name as category_name,p.id,p.category_id,p.title,p.body,p.aurthor,p.created_at FROM ".$this->table. " p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id=?";
        $stmt = $this -> conn->prepare($querry);
        $stmt->bindParam(1,$this->id);
        //$stmt->bindParam(2,$this->aurthor);
      
        $stmt->execute();
        $this->count =$stmt->rowCount();
        if($this->count>0){
        $this->mrow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->title = $this->mrow['title'];
        $this->body = $this->mrow['body'];
        $this->aurthor = $this->mrow['aurthor'];
        $this->category_id= $this->mrow['category_id'];
        $this->category_name = $this->mrow['category_name'];
        }else{
            print_r(array('message'=>"data not found"));
            die();
        }
        

    }


    public function create(){
        $querry = "INSERT INTO ".$this->table." SET title = :title,body = :body ,aurthor = :aurthor,category_id = :category_id";

        $stmt= $this->conn->prepare($querry);
        //clean data
        $this->title = htmlspecialchars($this->title);
        $this->body = htmlspecialchars(strip_tags( $this->body));
        $this->aurthor = htmlspecialchars(strip_tags($this->aurthor));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        
        
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':body',$this->body);
        $stmt->bindParam(':aurthor',$this->aurthor);
        $stmt->bindParam(':category_id',$this->category_id);
        if($stmt->execute()){
            return true;
        }
        echo "something goes wrong";
        return false;

    }





}





?>