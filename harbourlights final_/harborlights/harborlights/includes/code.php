<?php		
require 'dbh.inc.php';

session_start();

if(isset($_POST['addcat']))
{
    $cname=$_POST['cname'];
    $des=$_POST['desc'];
    $price=$_POST['price'];
    $beds=$_POST['beds'];
    
    $c="insert into tbl_roomcategory (name,beds,description,price,status) values('$cname','$beds','$des','$price','1')";
    $cr=  mysqli_query($conn, $c);
    if($cr)
    {
        header('location:../Hotel/admin/addcategory.php');
//        echo 'inserted';
    }
 else {
        echo 'not inserted';    
    }
    
}

if(isset($_POST['addroom']))
{
    $cid=$_POST['troom'];
    $roomno=$_POST['rno'];
    
    $s="insert into tbl_room (roomno,cid,status) values('$roomno','$cid','1')";
    $ce=  mysqli_query($conn, $s);
    
    if($ce)
    {
        header('location:../Hotel/admin/room.php');
//        header('location:../Hotel/admin/room.php');
    }
     else {
        echo 'not inserted';    
    }
}

if(isset($_POST['ava']))
    {
    $su=$_POST['su'];
    $rid=$_POST['rid'];
    
    if($su=="0")
    {
    $u="update tbl_room set status='1' where rid='$rid'";
    $ur=  mysqli_query($conn, $u);
    if($ur)
    {
        header('location:../Hotel/admin/room.php');
    }
    }
 else {
    $k="update tbl_room set status='0' where rid='$rid'";
    $kr=  mysqli_query($conn, $k);
    if($kr)
    {
        header('location:../Hotel/admin/room.php');
    }
    }
    }
    
    
    if(isset($_POST['cava']))
    {
    $su=$_POST['su'];
    $cid=$_POST['cid'];
    
    if($su=="0")
    {
    $u="update tbl_roomcategory set status='1' where cid='$cid'";
    $ur=  mysqli_query($conn, $u);
    if($ur)
    {
        header('location:../Hotel/admin/addcategory.php');
    }
    }
 else {
    $k="update tbl_roomcategory set status='0' where cid='$cid'";
    $kr=  mysqli_query($conn, $k);
    if($kr)
    {
        header('location:../Hotel/admin/addcategory.php');
    }
    }
    }


    if(isset($_POST['uproom']))
    {
        $rid=$_POST['rid'];
        $rrno=$_POST['rrno'];
        $rtype=$_POST['ttroom'];
        
        $e="update tbl_room set roomno='$rrno',cid='$rtype' where rid='$rid'";
        $er=  mysqli_query($conn, $e);
        
        if($er)
        {
           header('location:../Hotel/admin/room.php'); 
        }
    }
    
    
    if(isset($_POST['uppcat']))
    {
        $cid=$_POST['cid'];
        $cname=$_POST['cname'];
        $des=$_POST['desc'];
        $beds=$_POST['beds'];
        $price=$_POST['price'];
        
        $j="update tbl_roomcategory set name='$cname',description='$des',beds='$beds',price='$price' where cid='$cid'";
        $je=  mysqli_query($conn, $j);
        
        if($je)
        {
           header('location:../Hotel/admin/addcategory.php'); 
        }
    else {
            echo 'not';
    }
    }

?>
<?php
if (isset($_POST['login-submit'])){
    $username=$_POST['mailuid'];
    $pwd=$_POST['pwd'];
    
    $query1="select * from users where emailUsers='$username'";
    $query1_ex=  mysqli_query($conn, $query1);
    $row1=  mysqli_fetch_array($query1_ex);
    $uname=$row1['fname'];
    $_SESSION['uname']=$uname;
    $_SESSION['id']= $row1['idUsers'];
        $_SESSION['u']=$username;
    $dbusername=$row1['emailUsers'];
    $dbpwd=$row1['pwdUsers'];
    
    $query2="select * from login where usname='$username' and pass='$pwd'";
    $query2_ex=mysqli_query($conn,$query2);
    $row2=  mysqli_fetch_array($query2_ex);
    $_SESSION['usname']=$row2['usname'];
     $_SESSION['usname']=$row2['usname'];
    
    if(mysqli_num_rows($query1_ex) > 0 || mysqli_num_rows($query2_ex) > 0 ){
        if($username == $dbusername && $pwd=$dbpwd){
//            $_SESSION['umail']=$username;
            $_SESSION['status']="<h2 class='text-center text-success'>Login Successfully.</h2>";
            header('location:../userindex.php');
        }
        else if($username == $row2['usname'] && $pwd=$row2['pass']){
             $_SESSION['status']="<h2 class='text-center text-success'>Welcome Admin.</h2>";
             header('location:../Hotel/admin/home.php');
        }
    else {
            echo 'not';
    }
    }
}




if(isset($_POST['rbook']))
    {
//    $umail=$_SESSION['umail'];
    $umail=$_POST['mail'];
    $s="select idUsers from users where emailUsers='$umail'";
    $sr=  mysqli_query($conn, $s);
    $j=  mysqli_fetch_array($sr);
    $uid=$j['idUsers'];
    
    $rid=$_POST['rid'];
    if(isset($_POST['cindate']) && isset($_POST['coutdate'])){
    $checkin=$_POST['cindate'];
    $checkout=$_POST['coutdate'];
}else{
    $checkin=   date("Y-m-d H:i:s", strtotime($_POST['cindatetime']));;
    $checkout=  date("Y-m-d H:i:s", strtotime($_POST['coutdatetime']));;
}
    $_SESSION['rid']=$rid;
     echo $checkin;
    echo $checkout;
    
    $i="insert into tbl_booking (uid,rid,checkin,checkout,status) values('$uid','$rid','$checkin','$checkout','1')";
    $ir=  mysqli_query($conn, $i);
    if($ir)
    {
        header('location:../payTm/PaytmKit/TxnTest.php');
    }
    
    }


if(isset($_POST['addemp'])){

    $name=$_POST['ename'];
    $add=$_POST['address'];
    $cno=$_POST['cno'];
    $pincode=$_POST['pincode'];
    $hdate=$_POST['hdate'];
    $email=$_POST['email'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $post=$_POST['post'];
    $shift=$_POST['shift'];
    $salary=$_POST['salary'];

    $s="insert into tbl_employe (name,email,address,cno,state,pincode,city,post,shift,hdate,salary,status) values('$name','$email','$add','$cno','$state','$pincode','$city','$post','$shift','$hdate','$salary','1')";
    $ss=mysqli_query($conn,$s);

    if($ss)
    {
        header("Location:../Hotel/admin/employe.php");
    }


}

if(isset($_POST['upemp'])){
    $eid=$_POST['eid'];

    $name=$_POST['ename'];
    $add=$_POST['address'];
    $cno=$_POST['cno'];
    $pincode=$_POST['pincode'];
    // $hdate=$_POST['hdate'];
    $email=$_POST['email'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $post=$_POST['post'];
    $shift=$_POST['shift'];
    $salary=$_POST['salary'];

    $s="update tbl_employe set name='$name', email='$email', address='$add', cno='$cno', state='$state', pincode='$pincode', city='$city', post='$post', shift='$shift', salary='$salary' where eid='$eid'";
    $ss=mysqli_query($conn,$s);

    if($ss)
    {
        header("Location:../Hotel/admin/employe.php");
    }


}










?>