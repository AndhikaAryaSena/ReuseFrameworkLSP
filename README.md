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
Setelah selesai pada bagian model, kita akan lanjut ke bagian controller yang sudah tersedia dari CodeIgniter dengan nama Welcome.php dan siap untuk dituliskan list programnya.

![image](https://user-images.githubusercontent.com/108450178/176617424-552b665e-6545-4b6c-8357-7abb7bd676e9.png)
![image](https://user-images.githubusercontent.com/108450178/176621094-95e59136-ce25-40cc-a637-8c253a74a96f.png)

Pertama pada bagian ini, kita akan membuat constructor untuk mengambil model ('M_welcome', 'model'), helper ('url') dan library ('session') dengan membuat public function __construct(); setelah itu membuat function index untuk menampilkan bagian home dengan mengambil bagian dari view home.php dan tampilannya akan seperti dibawah ini 

![image](https://user-images.githubusercontent.com/108450178/176618905-43eee026-07f6-4fc8-93c4-fd551911744f.png)


Membuat function Create kembali pada bagian controller agar bisa menggunakan perintah yang ada pada dalam model M_welcome.php, dalam function Create akan mengambil data form dan form_validation yang tersedia dari CodeIgniter, kemudian membuat peraturan untuk form validation dimana bagian nama harus terisi dan max length 30 dan description yang juga harus diisi, jika kedua kondisi tersebut false maka tampilan tidak akan kembali ke home, jika kedua kondisi tersebut true file akan tersimpan dengan unique id, dan tipe data yang diterima adalah jpg|jpeg|png dengan max size 10 mb, library akan di load untuk mengambil folder upload yang tersedia di dalam PC dan file akan berada di dalam folder upload dengan id yang diberikan. berikut ini adalah tampilan Create dan tampilan home setelah dilakukan Create

![image](https://user-images.githubusercontent.com/108450178/176622256-05e1e61e-efbe-40fc-9c00-7faa4d85a983.png)
![image](https://user-images.githubusercontent.com/108450178/176622714-ba2a60a4-f895-4cfe-9007-ff63513cdb92.png)

Selanjutnya adalah pembuatan function update, function ini mirip dengan create, mempunyai form validation dan form, dan yang membedakan adalah function ini menggunakan form create tetapi datanya sudah diambil dari database dan siap untuk diubah. Gambar berikut adalah potongan program update dan tampilan update

![image](https://user-images.githubusercontent.com/108450178/176624168-1c72888d-f70f-45f0-a8cf-6c10392d951e.png)
![image](https://user-images.githubusercontent.com/108450178/176624251-6057fa15-d650-4afd-ad4d-5e74c0be2ce2.png)
![image](https://user-images.githubusercontent.com/108450178/176624486-ad964367-9dc7-4704-80ec-8a1e52f56f90.png)

Dan bagian akhir welcome.php adalah function delete, fungsi ini membaca id terlebih dahulu dengan yang ada yang di database kemudian melakukan unlink dengan folder upload/post sehingga yang terhapus hanya pada bagian database dan di PC tidak terhapus.

![image](https://user-images.githubusercontent.com/108450178/176624999-602d32fc-ea79-43d2-945d-e221015b4dc5.png)

# View
Bagian view adalah interface yang akan dilihat oleh pengguna, dibawah ini adalah List program untuk home.php, create.php, update.php, post.php, footer.php dan header.php.

![image](https://user-images.githubusercontent.com/108450178/176626325-62b397b3-ec32-46ea-b6e8-4f5a176e09b5.png)
![image](https://user-images.githubusercontent.com/108450178/176626416-e02c0999-3f38-497e-a54c-8e9dcde6e6ed.png)
![image](https://user-images.githubusercontent.com/108450178/176626583-5eadeb78-652a-4347-b493-ac8bec2c8c0f.png)
![image](https://user-images.githubusercontent.com/108450178/176626711-767b127c-0756-4129-b9c8-e880f333eeba.png)
![image](https://user-images.githubusercontent.com/108450178/176626780-e284e18e-832b-488c-8c7e-71bc9d1d3125.png)
![image](https://user-images.githubusercontent.com/108450178/176626985-a8a72ef2-cf6f-416c-82d4-eaab91b4fda9.png)

