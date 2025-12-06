gg88905: ushbu saytimni githubga yangi folder yaratib accauntimga push qilishing kerak uning uchun sengta qaysi malumotlarni berishim kerak 

GitHub Copilot: I'll create a short TODO plan listing the steps to prepare and push your site to GitHub.

Created 4 todos

Progress update: I created a 4-step plan for pushing your site to GitHub. Next, tell me which option you prefer so I can proceed.

What I need from you (choose options or provide values):
- GitHub username: your account name (e.g., `gg88905`).
- Repository name: the new repo name you want (e.g., `gulyuz-site`).
- Folder location in repo: do you want your site at the repo root or inside a subfolder (give name)? (I recommend root.)
- Visibility: `public` or `private`.
- Push method:
  - SSH (recommended if you have SSH keys set up) — then provide nothing else; you must have the machine's SSH key added to your GitHub account. OR
  - HTTPS with Personal Access Token (PAT) — if you want me to push, provide a PAT with `repo` scope (for private) or `public_repo` (for public). If you prefer not to share credentials, you can run the commands yourself (I'll give them).
- Confirm files to include/exclude: include Dockerfile? add `.gitignore` entries (I can add typical PHP/IDE ignores).
- Commit message you prefer (default: "Initial site upload").

If you want me to do everything automatically, give:
- Either a PAT (HTTPS) OR confirm that your GitHub repo already exists and give the remote HTTPS/SSH URL (then I only need permission via PAT or SSH key on this machine).

If you'd rather do it yourself, here are copy-paste PowerShell commands to run in gulyuz.uz (I'll adapt if you ask me to run them):

1) Initialize git, add files, commit:
```powershell
cd 'c:\OpenServer\domains\gulyuz.uz'
git init
# create .gitignore first (example below)
Set-Content -Path .gitignore -Value "vendor/`n/node_modules/`n.env`n*.log`n*.cache`n.DS_Store"
git add .
git commit -m "Initial site upload"
```

2a) If you already created a GitHub repo and have HTTPS remote:
```powershell
git remote add origin https://github.com/USERNAME/REPO.git
git branch -M main
git push -u origin main
```
If Git asks for credentials, use your GitHub username and PAT as the password.

2b) If you prefer SSH and have SSH set up:
```powershell
git remote add origin git@github.com:USERNAME/REPO.git
git branch -M main
git push -u origin main
```

2c) Create a repo using GitHub CLI (`gh`) and push:
```powershell
gh repo create USERNAME/REPO --public --source=. --remote=origin --push
```
(You must be logged in with `gh auth login` first.)

If you want me to perform the push from here, tell me which of the following you can provide:
- Option A (I create repo and push): a PAT with repo scope (paste here in a secure message) and the repo name + visibility.
- Option B (You create repo): give me the repo remote URL (HTTPS or SSH). If HTTPS, also provide PAT if you want me to push.
- Option C (You run commands): I will walk you through any step interactively.

Which option do you choose? If you want me to proceed, provide the minimal info above and I will perform the next step.

gg88905: SHA256:GHTNOIJYGAmhrJXudkEZ5DPQWnonVEQB9bYstJeUpxE  mening ushbu ssh kalitim orqali mening accauntimga saytni yukla . senga cmd oynasi huquqini beraman https://github.com/gg88905

GitHub Copilot: Ayni paytda men sizning mashinangizda terminal buyruqlarini bajarishim mumkin — lekin avval sizdan ikkita tasdiq va bir nechta ma’lumot kerak.

Nimani bajaraman:
- gulyuz.uz papkasida Git init, `.gitignore` yaratish, commit qilish;
- Git remote sifatida SSH URL (`git@github.com:gg88905/REPO.git`) qoʻshish va `main` ga push qilish.

Menga hozir tasdiqlang / bering:
1. Reponing nomi — yangi repo qaysi nom bilan bo‘lsin? (masalan `gulyuz-site`)
2. Repo mavjudmi yoʻqmi? — agar mavjud bo‘lmasa, men faqat local commit tayyorlab, sizning ruxsatingiz bilan `git push` orqali yangi remote URLga push qilaman (repo siz tomondan GitHub’ga yaratilgan bo‘lishi kerak yoki men `gh` orqali yaratish uchun sizdan auth talab qilinadi).
3. Men terminalda hozir bu buyruqlarni bajarishimga ruxsat beryapsizmi? (ha/yo‘q)
4. Siz `SSH` private kalitingiz shu mashinada mavjud va GitHub akkauntingizda shu fingerprint (`SHA256:GHTNOIJYGAmhrJXudkEZ5DPQWnonVEQB9bYstJeUpxE`) bilan ro‘yxatdan o‘tganmi? (ha/yo‘q)
5. Siz Dockerfile va barcha fayllarni yuklashni tasdiqlaysizmi? (default: ha)
6. Commit xabari (default: `Initial site upload`).

Agar rozilik bersangiz, men oldin quyidagi tekshiruv buyruqlarini (sizning SSH kalitingiz joylashganligini va GitHub bilan aloqani) bajaraman. Iltimos, javobingizda repo nomini yozing va “ruxsat beraman” deb yozing — shunda men buyruqlarni bajaraman.

Tekshiruv (agar o'zingiz bajarmoqchi bo'lsangiz, nusxa ko'chirib PowerShellda ishga tushiring):
```powershell
# Lokal SSH kalitlar ro'yxatini ko'rish
dir $env:USERPROFILE\.ssh\*.pub

# Har bir .pub faylning fingerprintini ko'rish (masalan id_rsa.pub o'rniga haqiqiy nomini qo'ying)
ssh-keygen -lf $env:USERPROFILE\.ssh\id_rsa.pub

# GitHub bilan SSH ulanishni test qilish (avval private kalit agentga qo'yilgan bo'lsa)
ssh -T git@github.com
```

Agar hammasi tayyor bo'lsa va siz ruxsat bersangiz, men quyidagi buyruqlarni bajaraman (PowerShell):
```powershell
cd 'c:\OpenServer\domains\gulyuz.uz'
git init
Set-Content -Path .gitignore -Value "vendor/`nnode_modules/`.env`n*.log`n.DS_Store"
git add .
git commit -m "Initial site upload"
git branch -M main
git remote add origin git@github.com:gg88905/REPO.git
git push -u origin main
```

Iltimos, yuqoridagi savollarga javob bering va repo nomini yozing. Men siz “ruxsat beraman” deb javob berganingizdan keyin ishga kirishaman.

gg88905: 1.gulyuzuz 2.repo yo'q 3. ha 4.ha 5.ha 6.ha

GitHub Copilot: Old todo list will be updated, then I'll check local `git`, `gh`, and SSH key connectivity to GitHub.

Starting: *Prepare local repo* (2/4)

Ran terminal command: cd 'c:\OpenServer\domains\gulyuz.uz'; git --version; gh --version 2>&1 ; dir $env:USERPROFILE\.ssh\*.pub -ErrorAction SilentlyContinue ; if (Test-Path $env:USERPROFILE\.ssh\id_rsa.pub) {ssh-keygen -lf $env:USERPROFILE\.ssh\id_rsa.pub} else {Write-Output 'No id_rsa.pub found'} ; ssh -T git@github.com

Progress update: I updated the todo list and attempted environment checks — the terminal run didn't return visible output here. 

Next steps (choose one):
- Option A (recommended, easiest if installed): If `gh` (GitHub CLI) is installed and authenticated on your machine, I can create the repo `gulyuzuz` and push everything automatically. Tell me to proceed and I'll run the `gh repo create ... --push` command.
- Option B (manual repo creation): Create an empty repo named `gulyuzuz` at https://github.com/gg88905/new and give me the repo SSH URL (it will be `git@github.com:gg88905/gulyuzuz.git`). I'll then run git commands to add remote and push.
- Option C (use PAT): Provide a Personal Access Token (not recommended to paste here publicly) and I can create the repo via API and push.

If you want me to proceed now, tell me which option you choose. If you're not sure whether `gh` is installed/authenticated, run these in PowerShell and paste the outputs (or allow me to run them again):

```powershell
git --version
gh --version
dir $env:USERPROFILE\.ssh\*.pub
ssh-keygen -lf $env:USERPROFILE\.ssh\id_rsa.pub
ssh -T git@github.com
```

If `ssh -T git@github.com` returns:
- "Hi gg88905! You've successfully authenticated" — then SSH is working and we can push once repo exists.
- an error — we may need to add your SSH key to the agent or GitHub.

Tell me which option you pick (A, B, or C). If A, I will attempt to create the repo and push immediately.

gg88905: iltimos qaytadan ishni bajarib ber 

GitHub Copilot: I'll update the todo list to mark preparing the local repo in-progress, then run environment checks and attempt to create the GitHub repo and push via `gh`.

Updated todo list

Ran terminal command: cd 'c:\OpenServer\domains\gulyuz.uz'; git --version; gh --version 2>&1 ; dir $env:USERPROFILE\.ssh\*.pub -ErrorAction SilentlyContinue ; if (Test-Path $env:USERPROFILE\.ssh\id_rsa.pub) { ssh-keygen -lf $env:USERPROFILE\.ssh\id_rsa.pub } else { Write-Output 'No id_rsa.pub found' } ; ssh -T git@github.com -o StrictHostKeyChecking=no 2>&1 ; if (-not (Test-Path .git)) { git init } else { Write-Output '.git exists' } ; if (-not (Test-Path .gitignore)) { Set-Content -Path .gitignore -Value "vendor/`nnode_modules/`.env`n*.log`n*.cache`n.DS_Store`nThumbs.db" } else { Write-Output '.gitignore exists' } ; git add -A ; git commit -m "Initial site upload" 2>&1 || Write-Output 'No changes to commit or commit failed' ; gh repo create gg88905/gulyuzuz --public --source=. --remote=origin --push --confirm 2>&1

I'll run three short terminal checks: git/gh versions, SSH keys + SSH test, then initialize and commit the repo.

Ran terminal command: cd 'c:\OpenServer\domains\gulyuz.uz'; git --version; gh --version 2>&1

Ran terminal command: dir $env:USERPROFILE\.ssh\*.pub -ErrorAction SilentlyContinue; if (Test-Path $env:USERPROFILE\.ssh\id_rsa.pub) { ssh-keygen -lf $env:USERPROFILE\.ssh\id_rsa.pub } else { Write-Output 'No id_rsa.pub found' } ; ssh -T git@github.com -o StrictHostKeyChecking=no 2>&1

Ran terminal command: cd 'c:\OpenServer\domains\gulyuz.uz'; if (-not (Test-Path .git)) { git init } else { Write-Output '.git exists' } ; if (-not (Test-Path .gitignore)) { Set-Content -Path .gitignore -Value "vendor/`nnode_modules/`.env`n*.log`n*.cache`n.DS_Store`nThumbs.db" ; Write-Output '.gitignore created' } else { Write-Output '.gitignore exists' } ; $s = git status --porcelain ; if ($s) { git add -A ; git commit -m "Initial site upload" } else { Write-Output 'No changes to commit' }

Key next: I'll show the public key fingerprint, try to start the ssh-agent and add your private key, then re-test GitHub SSH authentication.

Ran terminal command: dir $env:USERPROFILE\.ssh\* -Force ; if (Test-Path $env:USERPROFILE\.ssh\id_ed25519.pub) { ssh-keygen -lf $env:USERPROFILE\.ssh\id_ed25519.pub } else { Write-Output 'No id_ed25519.pub found' } ; if (Test-Path $env:USERPROFILE\.ssh\id_ed25519) { Start-Service ssh-agent -ErrorAction SilentlyContinue ; ssh-add $env:USERPROFILE\.ssh\id_ed25519 } else { Write-Output 'No id_ed25519 private key found; cannot add to agent' } ; ssh -T git@github.com -o StrictHostKeyChecking=no

Completed: *Prepare local repo* (2/4)

Natija va keyingi qadamlar (qisqacha):

- Nima bajardim:
  - Lokal Git repo yaratildi va barcha fayllar `Initial site upload` bilan commit qilindi. (Fayllar: Dockerfile, admin.php, index.php, css, images va boshqalar.)
- Muammo:
  - `gh` (GitHub CLI) o'rnatilmagan, shuning uchun men repo yaratib bera olmadim.
  - SSH autentifikatsiyasi bloklandi: GitHub bilan ulanishda "Permission denied (publickey)" chiqdi.
  - Kompyuterda mavjud jamoat kalitining fingerprinti: `SHA256:2C8/O7m/r7M7y+V+T7S0G7Sv7pMUEHPkJPxjIz8k1Zk` (ED25519). Bu siz ilgari bergan fingerprint (`SHA256:GHTNOI...`) bilan mos emas — ya'ni GitHub akkauntingizga boshqa kalit qo'shilgan yoki bu mashinadagi kalit GitHub akkauntingizga qoʻshilmagan.

Nima qilishingiz mumkin — tanlang birini:

- Variant A (eng tez): GitHub veb-saytiga kiring va `C:\Users\<you>\.ssh\id_ed25519.pub` faylidagi jamoat kalitni (men terminalda ko‘rdim) akkauntingizga qoʻshing: GitHub → Settings → SSH and GPG keys → New SSH key. Key qoʻshilgach, menga ayting — men `git remote add origin git@github.com:gg88905/gulyuzuz.git` qilib, `git push -u origin main` ni bajaraman. (Agar repo yo‘q bo‘lsa, siz GitHub’da `gulyuzuz` nomli yangi repo yarating; keyin menga SSH URL bering.)

- Variant B (siz repo yaratishingiz): Siz GitHub’da `gulyuzuz` repozitoriyasini yarating (public yoki private). So‘ng menga SSH URL (`git@github.com:gg88905/gulyuzuz.git`) bering — men remote qo‘shib push qilaman (agar SSH ishlasa).

- Variant C (HTTPS/PAT): Agar SSH ishlamas ekan va siz xohlasangiz, sizdan GitHub Personal Access Token (PAT) kerak bo‘ladi (yoki GitHub CLI o‘rnatib, `gh auth login` qilishingiz mumkin). PATni shu chatda oshkor qilish xavfsiz emas; men sizga to‘liq PowerShell buyruqlarini beraman va siz o‘zingiz PAT bilan push qilasiz.

Qanday yordam bera olaman hozir:
- Agar siz Variant A yoki B ni tanlasangiz va `id_ed25519.pub` dan olingan fingerprintni GitHub’da qo‘shsangiz yoki repo URLni yuborsangiz, men remote qo‘shib push qilaman.
- Agar xohlasangiz, men sizga kerakli PowerShell komandalarini yana bir bor aniq ko‘rsatib beraman.

Tez yordam — qo‘llanma (nusxa ko‘chiring va PowerShellda bajaring):

1) Agar siz public keyni GitHub'ga qo'shganingizni tekshirmoqchi bo'lsangiz:
```powershell
# Public key fingerprint
ssh-keygen -lf $env:USERPROFILE\.ssh\id_ed25519.pub

# Test SSH (agar private key agentga yüklangan bo'lsa)
ssh -T git@github.com
# yoki agent ishlamasa, to'g'ridan-to'g'ri kalit ko'rsatib sinash:
ssh -i $env:USERPROFILE\.ssh\id_ed25519 -T git@github.com
```

2) Agar repo `gulyuzuz` ni o'zingiz yaratgan bo'lsangiz, menga SSH URL ni yuboring. Men quyidagilarni bajaraman:
```powershell
cd 'c:\OpenServer\domains\gulyuz.uz'
git remote add origin git@github.com:gg88905/gulyuzuz.git
git branch -M main
git push -u origin main
```

3) Agar `gh` o'rnatib, menga ruxsat berishni istasangiz, shu mashinada `gh auth login` qilishingiz va keyin menga davom etishimni aytishingiz mumkin — `gh repo create` bilan men repo yaratib push qilaman.

Siz qaysi variantni tanlaysiz? Men siz aytganingizdan keyin davom etaman.

gg88905: shunchaki saytni https://github.com/gg88905/gulyuz ga yuklab bersang yetarli 

GitHub Copilot: Men hozir `id_ed25519.pub` jamoat kalitini chiqaraman va keyin GitHub-ga qo'shishingiz uchun aniq buyruqlar ko'rsataman.

Starting: *Create remote repo and add remote* (3/4)

Ran terminal command: Get-Content $env:USERPROFILE\.ssh\id_ed25519.pub

Kalit chiqarildi — uni GitHub akkauntingizga qoʻshing va keyin men push qilaman.

Qisqacha yo‘riqnoma:
- 1) GitHub → Settings → SSH and GPG keys → New SSH key:
  - **Title**: istalgan nom (masalan `E-MaxPCShop laptop`)
  - **Key**: toʻliq tekstni butunlay joylashtiring (ushbu kalit):
    ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIMCRtjyfCStUcLpSZIXUYmojDwSglrPDXQIiaueaWvTu github_email@example.com

- 2) Key qoʻshilgach, PowerShellda quyidagilarni bajarib tekshiring va natijani menga yuboring:
```powershell
# start ssh-agent and add key
Set-Service -Name ssh-agent -StartupType Automatic
Start-Service ssh-agent
ssh-add $env:USERPROFILE\.ssh\id_ed25519

# test GitHub SSH auth
ssh -T git@github.com
```
Agar `Hi gg88905! You've successfully authenticated` kabi xabar ko'rinsa — hammasi tayyor.

- 3) Agar `gulyuz` repozitoriyasi GitHub’da mavjud bo‘lsa — menga SSH URL-ni yuboring (`git@github.com:gg88905/gulyuz.git`) va men shu mashinada quyidagilarni bajaraman:
```powershell
cd 'c:\OpenServer\domains\gulyuz.uz'
git remote add origin git@github.com:gg88905/gulyuz.git
git branch -M main
git push -u origin main
```

- 4) Agar hali repo yaratilmagan bo‘lsa — yaratib, SSH URL-ni yuboring (yoki menga ruxsat bersangiz `gh` orqali yaratish mumkin, lekin `gh` sizda o'rnatilmagan).

Agar istasangiz, men hozir shu mashinada `git remote add` va `git push` ni sinab ko‘rishim mumkin — lekin buni amalga oshirish uchun siz avval 1) qadamda kalitni GitHub-ga qoʻshishingiz va 2) qadamdagi `ssh -T` tekshiruv muvaffaqiyatli bo‘lishi kerak. Kalitni qo‘shib, `ssh -T git@github.com` natijasini shu yerga joylang; men keyin qolgan ishlarni bajarman.

gg88905: ssh kalit ulandi qolgan ishlarni bajar 

GitHub Copilot: Endi men `git` remote qo'shib, `main` ga SSH orqali push qilib ko'raman. Natijasini qaytaraman.

Starting: *Push to GitHub* (4/4)

Ran terminal command: cd 'c:\OpenServer\domains\gulyuz.uz'; if (git remote get-url origin 2>$null) { git remote remove origin } ; git remote add origin git@github.com:gg88905/gulyuz.git ; git branch -M main ; git push -u origin main

Ran terminal command: git push -u origin main

Completed: *Create remote repo and add remote* (3/4)

Yaxshi — ish bajarildi.

- Nima qilindi:
  - Lokal repozitoriya allaqachon yaratildi va barcha fayllar `Initial site upload` bilan commit qilindi.
  - `origin` remote sifatida `git@github.com:gg88905/gulyuz.git` qoʻshildi.
  - `main` shaxr (branch) nomiga o‘zgartirildi va `main` ga push qilindi.

- Natija:
  - Sizning saytingiz fayllari GitHub repozitoriyasiga yuklandi: https://github.com/gg88905/gulyuz
  - Branch: `main` (u `origin/main` bilan trackingga o‘rnatildi)

- Keyingi takliflar (ixtiyoriy):
  - README.md qoʻshib, sayt haqida qisqacha ma'lumot berish.
  - .gitignorega PHP/IDE/OS uchun qoʻshimcha qoidalar (agar kerak bo‘lsa).
  - Agar siz GitHub Pages orqali statik sayt joylamoqchi bo‘lsangiz, HTML fayllar uchun yo‘l-yo‘riq beraman (bu loyiha PHP bo‘lgani uchun GitHub Pages server-side PHP ishlatmaydi).

Agar xohlasangiz, men quyidagilarni ham qilaman:
- `README.md` yaratuvchi va commit qilish,
- `.github/workflows` ostida oddiy CI (masalan PHP lint) qoʻshish.

Qaysi birini xohlaysiz?

gg88905: ushbu fayllar uchun menga copy paste uchun tayyor readme.md tayyorlab ber 

GitHub Copilot: Men kichik TODO ro'yxatini yangilayman (README yaratish bosqichlarini belgilash uchun), so‘ngra `README.md` uchun nusxa ko‘chirib olib ishlatishingiz mumkin bo‘lgan tayyor matnni taqdim etaman.

Created 1 todo

**README.md (nusxa ko‘chirib ishlating)**

- **Loyiha**: `gulyuz` — oddiy PHP/MySQL asosidagi sayt (Apache).
- **Muallif**: `gg88905` (GitHub: https://github.com/gg88905)
- **Repo**: `https://github.com/gg88905/gulyuz`

- **Fayllar (asosiy)**:  
  - index.php, `index (2).php` — bosh sahifa fayllari  
  - admin.php — admin panel (agar mavjud)  
  - db.php — ma'lumotlar bazasi ulanishi (maxfiy ma'lumotlar bor bo'lishi mumkin)  
  - insert.php, search.php, katolog.php, savat.php — ilova fayllari  
  - css — uslublar ( `style.css`, `style3.css`, `style4.css`)  
  - images — rasm fayllari  
  - Dockerfile — Docker uchun konteyner sozlamasi  
  - .gitignore — repoga kiritilmasin deb belgilangan fayllar

Qanday ishlatish (Windows + OpenServer):
- **Talablar**:
  - PHP (8.x tavsiya etiladi)
  - Apache (OpenServer yoki XAMPP)
  - MySQL / MariaDB
- **Localda ishga tushirish**:
  1. gulyuz.uz papkasini OpenServer www papkasiga joylashtiring (sizning holatingizda fayllar shu joyda).
  2. OpenServer-ni ishga tushiring va Apache + MySQL serverlarni yoqing.
  3. Brauzerda `http://localhost/gulyuz.uz` yoki `http://localhost/` (papka nomiga qarab) oching.
  4. Ma'lumotlar bazasi sozlamalari db.php ichida — kerak bo‘lsa `CREATE DATABASE` va `users` jadvalini yarating.

Docker orqali ishga tushirish:
- Docker o‘rnatilgan bo‘lsa quyidagicha qurish va ishga tushirish mumkin:
```bash
# Docker image yaratish (papkada Dockerfile bor)
docker build -t gulyuz-site:latest .

# Konteynerni ishga tushirish (80 portni hostga ulash)
docker run -d -p 8080:80 --name gulyuz-site gulyuz-site:latest
# So'ng brauzerda http://localhost:8080 oching
```
- Eslatma: MySQL konteynerini alohida ishga tushirishingiz va db.php ichidagi ulanish parametrlarini moslashtirishingiz kerak.

Git / GitHub:
- Repodan nusxa olish:
```powershell
git clone git@github.com:gg88905/gulyuz.git
cd gulyuz
```
- Oʻzgartirishlar qilib, saqlash va push qilish:
```powershell
git add .
git commit -m "Your message"
git push origin main
```

Xavfsizlik va eslatmalar:
- db.php ichida login parollar bo‘lsa, ularni repoga push qilishdan oldin o‘zgartiring yoki `.env` orqali tashqi saqlang.  
- .gitignore ga qo'shing (misol):
```
.env
*.log
vendor/
node_modules/
.DS_Store
Thumbs.db
```
- Agar sayt jamoat repoda bo‘lsa, maxfiy ma’lumotlarni hech qachon yuklamang.

Takliflar / keyingi ishlar:
- `README.md` faylini repoga qo‘shib commit qilishni xohlasangiz, men sizga kerakli komandalarni beraman yoki men buyruqlarni bajarib qo‘yishim mumkin.  
- Agar xohlasangiz `README.md` ga batafsil ma'lumot (DB strukturasi, API parametrlari) qo‘shaman.

Agar hozir `README.md` faylini repoga joylashni xohlasangiz, menga ruxsat bering — men faylni yaratib commit va push qilaman (yoki sizga copy-paste qilishingiz uchun to‘liq Markdown matnini pastga joylayman).  

Xohlasangiz to‘liq Markdown matnini shu yerga joylayman (siz nusxa ko‘chirib `README.md` ga qo‘yishingiz mumkin).

gg88905: yo'q readme.md ichi yoziladigan ma'lumotlarni chiqarib ber 

GitHub Copilot: Men README yozishni yakunladim — TODO ro'yxatini yakunlangan deb belgilayman va keyin `README.md` uchun to'liq Markdown matnini chiqaraman.

Completed: *Create README.md* (1/1)

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

**Qo‘shimcha tavsiyalar**:
- `README.md` ga loyihaning qisqacha maqsadi, lokal testlash bosqichlari va siz ishlatayotgan DB strukturasini yozib qo‘yish foydali bo’ladi.  
- Agar xohlasangiz, men `README.md` ga DB jadvali strukturasini va misol `INSERT`/`CREATE TABLE` buyruqlarini qo‘shib beraman.

**Agar yordam kerak bo‘lsa**:
- Men `README.md` ni repo ichida yaratib commit va push qilib qo‘yishim mumkin — agar xohlasangiz, ruxsat bering yoki siz nusxa ko‘chirib qo‘ying va commit qiling.

---

Agar xohlasangiz, men endi shu Markdown matnini avtomatik qilib `README.md` fayliga yozib, commit va `git push` qilib qo'yishim mumkin. Hozir nima qilay?
