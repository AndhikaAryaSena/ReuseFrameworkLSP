# ReuseFrameworkLSP
Ini adalah aplikasi untuk mengupload file berbentuk jpg/png/jpeg kedalam database dan PC, menggunakan sistem CRUD dan menggunakan prinsip MVC.

# Penjelasan Detail Program :
Pada bagian awal sebelum dimulai, membuat folder baru dan mmemasukkan folder yang ada dari codeigniter kedalam htdocs yang berada di dalam XAMPP

![image](https://user-images.githubusercontent.com/108450178/176606351-4e23a9d3-82e4-47f8-bfbe-926bd00f20d4.png)

Aktifkan Apache dan MySql di dalam XAMPP dan membuka phpmyadmin/localhost untuk membuat database.

![image](https://user-images.githubusercontent.com/108450178/176607469-26f003e2-3984-4711-bf5c-f0ac0e15e922.png) 
![image](https://user-images.githubusercontent.com/108450178/176607566-ef3b2168-1beb-4403-83e0-3e783c5c4064.png)

Setelah membuat folder dan database, membuka visual studio code dan membuka folder yang telah dibuat

![image](https://user-images.githubusercontent.com/108450178/176606707-99977e12-a2e0-4cb8-bf25-bbc7b3be2aaf.png)

# CONFIG
Pada bagian tersebut buka tab config dan klik config.php 

![image](https://user-images.githubusercontent.com/108450178/176607032-0ef64dea-577b-44e2-bbc6-0fb9b81044e2.png)

di dalam config.php ini berguna untuk menentukan url utama yang akan digunakan sebagai base url. seperti contoh diatas adalah localhost/ReuseFrameworkLSP agar dapat dibuka di dalam browser yang tersedia.

Setelah melakukan konfigurasi url di config.php, menuju database.php untuk menyambungkan program dengan database

![image](https://user-images.githubusercontent.com/108450178/176608274-074f367f-4e27-4e6e-a35d-3e636254bc7f.png)

cukup mengisi bagian '' yang diperlukan seperti password, user dan database, dari contoh yang diatas ini adalah database => 'sismul1'

# MODEL
Setelah selesai mengatur config, menuju ke tab model, kemudian membuat file php baru, agar namanya tidak membingungkan dengan controller (nama akan terlihat pada penjelasan bagian controller) membuat M_welcome.php.

![image](https://user-images.githubusercontent.com/108450178/176611123-3aa7b569-d6df-4ec5-ba85-b668fca6f0cf.png)

Pertama setelah membuat class M_Welcome, membuat function yaitu Create, Read, Update, dan Delete, semua function di dalam model ini akan bersifat public karena agar dapat dipanggil pada bagian controller.

Dalam function Create membuat variabel data dalam bentuk array yang berisi string yang nantinya bisa diambil dan dimasukkan. dan juga membuat 2 variabel untuk id dan filename, untuk string name dan description datanya harus diinput terlebih dahulu untuk masuk ke dalam array yang nantinya akan masuk ke dalam database. setelah membuat data array tersebut langsung menuliskan $this (function Create dipanggil) -> db (akses database) -> insert ('post', $data) kemudian akan dimasukkan ke dalam tabel post yang datanya akan diambil dari array variabel data.

Dalam function Read akan membaca variabel id apakah true atau false dengan if condition jika kondisi id = false maka program akan return untuk berusahan mengambil data yang berasal dari database, jika id = true maka kita akan mendapatkan data yang ada di dalam database untuk ditampilkan.

Dalam function Update hanya membaca dari variabel id yang dipilih kemudian akan membaca data array yang berisi nama dan deskripsi, jika kita mengubah nama dan deskripsi tersebut maka function update ini akan mencari dimana kondisi id yang sama kemudian mengupdate nama dan deskripsinya.

Dalam function Delete dan deleteAll hanya membaca dari variabel id yang dipilih dan langsung menghapus yang idnya sesuai dengan yang dipilih, bedanya Delete dan deleteAll adalah Delete hanya menghapus 1 row dari database, sementara deleteAll melakukan empty table.

# Controller
