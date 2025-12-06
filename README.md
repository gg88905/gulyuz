
**README.md (toʻliq Markdown — nusxa ko‘chirib `README.md` ga qoʻying)**

**Loyiha**: `gulyuz` — PHP/Apache sayt  
**Muallif**: `gg88905`  
**Repo**: `https://github.com/gg88905/gulyuz`

- **Tasvir**:  
  Ushbu repozitoriya oddiy PHP + MySQL asosidagi web-sayt fayllarini o‘z ichiga oladi. Apache server orqali ishlaydi; Docker uchun Dockerfile mavjud.

**Asosiy fayllar**:
- index.php, `index (2).php` : bosh sahifa fayllari  
- admin.php : admin panel (agar mavjud)  
- db.php : ma'lumotlar bazasi ulanishi (ma'lumotlar bazasi sozlamalari shu yerda)  
- insert.php, search.php, katolog.php, savat.php : aplikatsiya fayllari  
- css : uslub fayllari (`style.css`, `style3.css`, `style4.css`)  
- images : rasmlar katalogi  
- Dockerfile : Docker konteyneri uchun sozlama  
- .gitignore : repoga kiritilmasligi kerak fayllar ro'yxati

**Talablar (local)**:
- PHP 7.4+ (8.x tavsiya etiladi)  
- Apache (OpenServer, XAMPP yoki shunga o'xshash)  
- MySQL yoki MariaDB

**Localda ishga tushirish (Windows + OpenServer misolida)**:
- 1) Fayllarni gulyuz.uz papkasiga joylashtiring (yoki OpenServer www papkasiga).  
- 2) OpenServer (yoki XAMPP) ni ishga tushiring va Apache + MySQL xizmatlarini yoqing.  
- 3) Brauzerda `http://localhost/gulyuz.uz` yoki `http://localhost/` (papka nomiga qarab) oching.  
- 4) Ma'lumotlar bazasini yaratish va sozlash uchun db.php faylini tekshiring — kerak bo'lsa `CREATE DATABASE` va jadvallarni yarating.

PowerShell misoli (git orqali klonlash va ishga tushirish uchun):
```powershell
# Repodan nusxa olish
git clone git@github.com:gg88905/gulyuz.git
cd gulyuz

# Agar OpenServer ostiga ko'chirish kerak bo'lsa, papkani mos joyga ko'chiring
# So'ng OpenServer-da Apache va MySQL ni yoqing va brauzerda oching
```

**Docker bilan ishga tushirish**:
- Docker o‘rnatilgan holda loyihani konteynerda sinash uchun:
```bash
# Docker image yaratish (Dockerfile joyida)
docker build -t gulyuz-site:latest .

# Konteynerni ishga tushirish va host port 8080 ga bog'lash
docker run -d -p 8080:80 --name gulyuz-site gulyuz-site:latest

# So'ng brauzerda http://localhost:8080 ni oching
```
- Eslatma: Agar sizning sayt MySQL talab qilsa, MySQL konteynerini alohida ishga tushirish va db.php dagi ulanish parametrlarini Docker ichidagi MySQL ga moslashtirish kerak bo‘ladi.

**Git / GitHub ishlatish**:
- `git clone git@github.com:gg88905/gulyuz.git`  
- Oʻzgartirishlar qilish:  
```powershell
git add .
git commit -m "Xabar"
git push origin main
```

**Xavfsizlik va maxfiylik**:
- db.php ichida parol yoki boshqa maxfiy ma'lumotlar bo'lsa, ularni repoga yubormang. Buning o'rniga `.env` fayl yoki CI xizmatida maxfiy o'zgaruvchilarni qo'llang.  
- .gitignore ga qo'shish tavsiyalari:
```
.env
*.log
vendor/
node_modules/
.DS_Store
Thumbs.db
```
