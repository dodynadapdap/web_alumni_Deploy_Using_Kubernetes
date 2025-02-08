<?php
include "login_syn.php";

function query($query){
	global $connect;
	$result = mysqli_query($connect,$query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function ubah($data){
	global $connect;
	$id = $data["id"];
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$kontak = htmlspecialchars($data["kontak"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "UPDATE user1 SET 
	          Pekerjaan ='$pekerjaan', 
	          Alamat = '$alamat',
	          Kontak = $kontak 
	          WHERE id_user=$id";
	mysqli_query($connect,$query);   
	return mysqli_affected_rows($connect);       
}

function registrasi($data){
	global $connect;
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($connect,$data["password"]);
	$password = password_hash($password, PASSWORD_DEFAULT);
	$nama = htmlspecialchars($data["nama"]);
	$prodi = htmlspecialchars($data["prodi"]);
	$jk = htmlspecialchars($data["jk"]);
	$nim = htmlspecialchars($data["id"]);
	$angkatan = htmlspecialchars($data["angkatan"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$kontak = htmlspecialchars($data["kontak"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$gambar = upload();
	if(!$gambar){
          return false;
	}

	//cek username
	$result = mysqli_query($connect,"SELECT * FROM user1 where username = '$username' ");
	if(mysqli_fetch_assoc($result)){
		echo "<script>alert('Mohon maaf username sudah ada');</script> ";
	}

	mysqli_query($connect,"INSERT INTO user1 values('','$username','$password','$nama','$jk','$nim','$angkatan','$pekerjaan','$kontak','$alamat','$gambar','$prodi') ");

	return mysqli_affected_rows($connect);
}
function tambah1($data){
	global $connect;
	$nama = htmlspecialchars($data["nama"]);
	$prodi = htmlspecialchars($data["prodi"]);
	$jk = htmlspecialchars($data["jk"]);
	$kerja = htmlspecialchars($data["pekerjaan"]);
	$angkatan = htmlspecialchars($data["angkatan"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "INSERT INTO data VALUES('','$nama','$jk','$prodi','$angkatan','$alamat','$kerja') ";
	mysqli_query($connect,$query);   
	return mysqli_affected_rows($connect);      
}
function upload(){
	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];
	if($error === 4){
		echo"<script>alert('Upload gambar anda');</script>";
		return false;
	}

	$ekstensigambarvalid =['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if(!in_array($ekstensigambar, $ekstensigambarvalid)){
		echo"<script>alert('Tolong upload foto anda');</script>";
	}

	if($ukuranfile > 1000000){
		echo"<script>alert('Ukuran gambar terlalu besar');</script>";
	}

	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/'. $namafilebaru);

	return $namafilebaru;

}
function registrasi2($data){
	global $connect;
	$id = $data["id"];
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($connect,$data["password"]);
	$password = password_hash($password, PASSWORD_DEFAULT);
	$gambar = upload();
	if(!$gambar){
          return false;
	}
	

	//cek username
	$result = mysqli_query($connect,"SELECT * FROM admin where username = '$username' ");
	if(mysqli_fetch_assoc($result)){
		echo "<script>alert('Mohon maaf username sudah ada');</script> ";
	}

	mysqli_query($connect,"INSERT INTO admin values('','$username','$password','$gambar') ");

	return mysqli_affected_rows($connect);
}

function password($data){
	global $connect;
	$id = $data["id"];
	$password = mysqli_real_escape_string($connect,$data["password"]);
	$password1 = mysqli_real_escape_string($connect,$data["password1"]);
	$password2 = mysqli_real_escape_string($connect,$data["password2"]);
	$password = password_hash($password, PASSWORD_DEFAULT);
	$password1 = password_hash($password1, PASSWORD_DEFAULT);
	$password2 = password_hash($password2, PASSWORD_DEFAULT);

	

	//cek username
	$result = mysqli_query($connect,"SELECT * FROM user1 where password = '$password' ");
	if(mysqli_fetch_assoc($result)){
		echo "<script>alert('Mohon masukkan password yang benar');</script> ";
	}
	if($password1 <> $password2){
		echo "<script>alert('Mohon maaf Password Tidak valid');</script> ";
	}

	mysqli_query($connect,"UPDATE user1 SET 
	          password = '$password2'
	          WHERE id_user=$id");
    
	return mysqli_affected_rows($connect);
}

function hapus($id){
	global $connect;
	mysqli_query($connect,"DELETE FROM data Where id = $id");
	return mysqli_affected_rows($connect);
}
function hapus1($id){
	global $connect;
	mysqli_query($connect,"DELETE FROM data Where id = $id");
	return mysqli_affected_rows($connect);
}
function ubah2($data){
	global $connect;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$prodi = htmlspecialchars($data["prodi"]);
	$jk = htmlspecialchars($data["jk"]);
	$kerja = htmlspecialchars($data["pekerjaan"]);
	$angkatan = htmlspecialchars($data["angkatan"]);
	$alamat = htmlspecialchars($data["alamat"]);
	
	$query = "UPDATE data SET 
	          Nama='$nama', 
	          Prodi ='$prodi', 
	          Jk = '$jk',
	          Angkatan =$angkatan, 
	          Alamat = '$alamat',
	          Pekerjaan = '$kerja'
	          WHERE id = $id";
	mysqli_query($connect,$query);   
	return mysqli_affected_rows($connect);       
}
function cari($keyword){
	$query = "SELECT * FROM data where nama Like '%$keyword%' OR
	    Pekerjaan Like '%$keyword%' OR 
	    angkatan Like '%$keyword%' OR 
	    alamat Like '%$keyword%' 
	    or prodi Like '%$keyword%' OR angkatan Like '%$keyword%' ";
	return query($query);
}
function cari1($keyword){
	$query = "SELECT * FROM user1 where nama Like '%$keyword%' OR
	    number_id Like '%$keyword%' OR 
	    angkatan Like '%$keyword%' OR 
	    alamat Like '%$keyword%' 
	    or prodi Like '%$keyword%' or pekerjaan Like '%$keyword%' or username Like '%$keyword%' or kontak like '%$keyword%' ";
	return query($query);
}
function ubah3($data){
	global $connect;
	$id = $data["id"];
	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama"]);
	$prodi = htmlspecialchars($data["prodi"]);
	$jk = htmlspecialchars($data["jk"]);
	$angkatan = htmlspecialchars($data["angkatan"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$kontak = htmlspecialchars($data["kontak"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$num_id = htmlspecialchars($data["num_id"]);
	$gambarlama = htmlspecialchars($data['gambarlama']);

	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarlama;
	}
	else{
		$gambar = upload();
	}
	$query = "UPDATE user1 SET 
	          Nama='$nama', 
	          Prodi ='$prodi', 
	          Jk = '$jk',
	          number_id ='$num_id', 
	          Angkatan =$angkatan, 
	          Pekerjaan ='$pekerjaan', 
	          Alamat = '$alamat',
	          Kontak = $kontak ,
	          gambar = '$gambar',
	          username = '$username'
	          WHERE id_user=$id";
	mysqli_query($connect,$query);   
	return mysqli_affected_rows($connect);       
}

