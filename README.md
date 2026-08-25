# 🛒 Toki Multi-Vendor Marketplace | متجر وسوق توكي متعدد التجار

منصة تجارة إلكترونية وسوق تجاري متعدد التجار مستوحى من كبرى المنصات مثل نون (Noon) وأمازون (Amazon)، يدعم اللغتين العربية والإنجليزية والشحن المتعدد (توكي برايم، توكي إكسبريس، توكي ماركت).

---

## 🚀 النشر السريع على Vercel (Quick Deployment to Vercel)

يمكنك نشر واجهة المتجر (Frontend) على Vercel بضغطة زر أو بربط مستودع GitHub:

[![Deploy with Vercel](https://vercel.com/button)](https://vercel.com/new)

### خطوات النشر على Vercel:
1. ارفع المشروع على حسابك في **GitHub** (راجع الأوامر أدناه).
2. افتح [Vercel Dashboard](https://vercel.com/dashboard) واضغط **"Add New Project"**.
3. اختر مستودع **GitHub** الخاص بالمشروع واضغط **Import**.
4. في إعدادات المشروع:
   - **Framework Preset:** `Other`
   - **Root Directory:** يمكنك تركه `./` (تم ضبط التوجيه التلقائي عبر `vercel.json`) أو تحديد مجلد `Toki`.
5. اضغط **Deploy** وستحصل على رابط موقعك المباشر في ثوانٍ!

---

## 🛠️ أوامر الرفع على GitHub (Push to GitHub Steps)

افتح موجه الأوامر (Terminal) في مجلد المشروع ونفّذ الأوامر التالية بالترتيب:

```bash
# 1. تهيئة مستودع Git محلي
git init

# 2. إضافة جميع الملفات (تم استبعاد الملفات الثقيلة تلقائياً عبر .gitignore)
git add .

# 3. حفظ التغييرات (Commit)
git commit -m "Initial commit - Toki Marketplace frontend and configurations"

# 4. تغيير اسم الفرع إلى main
git branch -M main

# 5. ربط المستودع المحلي بمستودع GitHub الخاص بك (استبدل الرابط برابط مستودعك)
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git

# 6. رفع الكود إلى GitHub
git push -u origin main
```

---

## 📁 هيكلية المشروع (Project Structure)

| المجلد / الملف | الوصف |
| :--- | :--- |
| **`Toki/`** | **الواجهة الأمامية الثابتة (Frontend - HTML5/CSS3/JS):** الجاهزة للنشر المباشر على Vercel. |
| **`toki 2/`** | **الواجهة الخلفية (Backend - WordPress & WooCommerce):** نظام ووردبريس مع إضافة WCFM لإدارة التجار وقالب توكي المخصص. |
| **`vercel.json`** | ملف إعدادات التوجيه والحماية والتخزين المؤقت لمنصة Vercel. |
| **`.gitignore`** | يستبعد الملفات الكبيرة (مثل ملفات zip الأرشيفية) لمنع تجاوز حد 100MB في GitHub. |
| **`PROJECT_REPORT.md`** | تقرير فني شامل ومفصل لجميع أجزاء وبرمجيات المشروع وقواعد البيانات. |

---

## 💡 ملاحظات هامة بخصوص Vercel و WordPress:
* **واجهة المتجر (Frontend في مجلد `Toki`):** مصممة بـ HTML5/CSS3/JS وتعمل على Vercel بنسبة 100% وبسرعة فائقة.
* **النظام الخلفي الكامل (Backend في مجلد `toki 2`):** مبني على PHP وقاعدة بيانات MySQL، ويحتاج إلى استضافة PHP/MySQL (مثل Hostinger, cPanel, Cloudways, VPS) لتشغيل لوحة التحكم الديناميكية بالكامل.
