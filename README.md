## Projeyi Çalıştırma ve Kullanma

### Projeyi Çalıştırma

Projeyi yerel ortamınızda çalıştırmak için aşağıdaki adımları izleyin:

1. Depoyu yerel makinenize klonlayın.
2. Bağımlılıkları yüklemek için aşağıdaki komutları çalıştırın:
   ```bash
   composer install
   npm install

3. Geliştirme sunucusunu başlatmak için aşağıdaki komutları çalıştırın:
   ```bash
   npm run dev
   php artisan serve
4. Tarayıcınızda projeyi görüntülemek için http://localhost:8000 adresini ziyaret edin.

5. Deneme olarak kerem@kul.com adresini ve 12345678 şifresini kullanabilirsiniz. 

## Uygulamayı Kullanma
   ### Hasta Listesi: 
   Hasta listesi kısmında bulunan mavi "information" butonuna tıkladığınızda hastanın diş haritası görüntülenir. Bu bölümde diş ile ilgili işlemleri görüntüleyebilirsiniz.
   ### Yan Menü: 
   Uygulamanın farklı bölümlerine yan menü kullanarak erişebilirsiniz. Ana bölümler şunlardır:
   ### Hasta Randevu Listesi: 
   Yaklaşan hasta randevularını görüntüleyin ve yönetin.
   ### Hasta Listesi: 
   Tüm hastaların listesini erişin.
   ### Geçmiş Randevular: 
   Geçmiş randevuların ve tedavilerin tarihçesini inceleyin.
   ### Hesabım: 
   Doktor olarak profil bilgilerinize erişebilir ve güncelleyebilirsiniz. Çıkış yapmak için "Hesabım" bölümünde bulunan "Çıkış Yap" butonuna tıklayın 
   ## Önemli
   Geçmiş randevular kısmının çalışması için Görev Zamanlayıcıdan yarım satte bir çalışan görev oluşturulması lazım yoksa elle terminale 
   ```bash
   php artisan appointments:update-status 
   ```  
   Kodu girilmesi gerekiyor
