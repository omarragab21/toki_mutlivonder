// Toki Products Catalog Database
var TOKI_PRODUCTS = [
    {
        id: "apple_watch_7",
        title: "أبل ساعة سيريس 7 مم مزودة بنظام تحديد المواقع ومقاومة للماء",
        title_en: "Apple Watch Series 7 GPS 45mm Waterproof Smartwatch",
        price: 1754,
        old_price: 1969,
        discount: "10%",
        category: "الساعات والإلكترونيات",
        category_en: "Watches & Electronics",
        img: "img/p-1.png",
        gallery: ["img/p-1.png", "img/wt1.png", "img/wt2.png", "img/wt3.png"],
        colors: [
            { name: "أسود", name_en: "Black", img: "img/smw1.png" },
            { name: "أصفر", name_en: "Yellow", img: "img/smw2.png" },
            { name: "أحمر", name_en: "Red", img: "img/smw3.png" }
        ],
        rating: 4.8,
        reviews_count: 255,
        model: "APW-745-GPS",
        seller: "متجر توكي الرسمي",
        seller_en: "Toki Official Store",
        badge: "اكسبرس",
        badge_class: "orange_color",
        description: "شاشة ريتينا كبيرة ومشرقة تعمل دائمًا، مقاومة للكسر والماء بمعيار IP6X، قياس أكسجين الدم وتخطيط القلب ومتابعة النوم.",
        description_en: "Always-On Retina display, crack-resistant front crystal, dust resistant IP6X, measure blood oxygen and ECG.",
        features: [
            "زجاج أمامي من الكريستال المقاوم للكسر، وهو الأقوى في ساعات أبل حتى الآن",
            "مقاومة للغبار والماء تمتاز بشهادة IP6X ومقاومة للسباحة حتى عمق 50 متر",
            "قياس مستوى أكسجين الدم بمستشعر ثوري وتطبيق تخطيط القلب المتقدم ECG",
            "شحن فائق السرعة أسرع بنسبة تصل إلى 33% مقارنة بالجيل السابق"
        ],
        features_en: [
            "Most crack-resistant front crystal ever on an Apple Watch",
            "IP6X dust resistance and swimproof design up to 50 meters",
            "Measure your blood oxygen and take an ECG anytime, anywhere",
            "Up to 33% faster charging compared to previous generations"
        ],
        specs: [
            { label: "توافق الماركة", label_en: "Brand Compatibility", value: "Apple iOS" },
            { label: "مقاومة الماء", label_en: "Water Resistance", value: "حتى 50 متر (WR50)" },
            { label: "نوع التوصيل", label_en: "Connectivity", value: "بلوتوث 5.0 / واي فاي / GPS" },
            { label: "المادة", label_en: "Case Material", value: "ألومنيوم فضائي ممتاز" },
            { label: "حجم الشاشة", label_en: "Display Size", value: "45 مم OLED Retina" }
        ]
    },
    {
        id: "iphone_13_pro",
        title: "آبل آيفون 13 برو ماكس 256 جيجابايت أزرق سييرا 5G",
        title_en: "Apple iPhone 13 Pro Max 256GB Sierra Blue 5G",
        price: 4299,
        old_price: 4899,
        discount: "12%",
        category: "الموبايلات والهواتف",
        category_en: "Mobiles & Phones",
        img: "img/cd1.png",
        gallery: ["img/cd1.png", "img/cd2.png", "img/cd3.png", "img/mob-1.png"],
        colors: [
            { name: "أزرق سييرا", name_en: "Sierra Blue", img: "img/cd1.png" },
            { name: "فضي", name_en: "Silver", img: "img/cd2.png" },
            { name: "ذهبي", name_en: "Gold", img: "img/cd3.png" }
        ],
        rating: 4.9,
        reviews_count: 680,
        model: "MLK23AA/A",
        seller: "متجر توكي الرسمي",
        seller_en: "Toki Official Store",
        badge: "اكسبرس",
        badge_class: "orange_color",
        description: "شاشة Super Retina XDR مقاس 6.7 إنش مع ProMotion، نظام كاميرات Pro ثلاثي 12MP، معالج A15 Bionic الخارق وعمر بطارية غير مسبوق.",
        description_en: "6.7-inch Super Retina XDR display with ProMotion, Pro 12MP camera system, A15 Bionic chip and all-day battery life.",
        features: [
            "شاشة Super Retina XDR مع تكنولوجيا ProMotion بمعدل تحديث تكيفي حتى 120Hz",
            "نظام كاميرات احترافي مع نمط سينمائي يسجل فيديو بنطاق ديناميكي عالي بتقنية Dolby Vision",
            "شريحة A15 Bionic فائقة السرعة مع وحدة معالجة رسومات خماسية النوى",
            "واجهة Ceramic Shield أقوى من زجاج أي هاتف ذكي مع مقاومة الماء IP68"
        ],
        features_en: [
            "6.7-inch Super Retina XDR with ProMotion up to 120Hz",
            "Pro camera system with Cinematic mode in Dolby Vision",
            "Superfast A15 Bionic chip with 5-core GPU",
            "Ceramic Shield front with industry-leading IP68 water resistance"
        ],
        specs: [
            { label: "الذاكرة الداخلية", label_en: "Storage", value: "256 جيجابايت" },
            { label: "الشاشة", label_en: "Screen Size", value: "6.7 بوصة Super Retina XDR OLED" },
            { label: "المعالج", label_en: "Processor", value: "Apple A15 Bionic 6-core" },
            { label: "شبكة الاتصال", label_en: "Network", value: "5G فائقة السرعة" },
            { label: "الكاميرا", label_en: "Cameras", value: "ثلاثية 12 ميجابكسل + LiDAR Scanner" }
        ]
    },
    {
        id: "macbook_pro_14",
        title: "لابتوب أبل ماك بوك برو 14 إنش شريحة M1 برو 512 جيجابايت رمادي فلكي",
        title_en: "Apple MacBook Pro 14-inch M1 Pro 512GB Space Gray",
        price: 7899,
        old_price: 8599,
        discount: "8%",
        category: "أجهزة اللابتوب والكمبيوتر",
        category_en: "Laptops & Computers",
        img: "img/lap.png",
        gallery: ["img/lap.png", "img/lap-1.png", "img/lap-2.png", "img/lap-3.png"],
        colors: [
            { name: "رمادي فلكي", name_en: "Space Gray", img: "img/lap.png" },
            { name: "فضي", name_en: "Silver", img: "img/lap-1.png" }
        ],
        rating: 5.0,
        reviews_count: 140,
        model: "MKGP3AB/A",
        seller: "توكي ديجيتال",
        seller_en: "Toki Digital",
        badge: "بريمير",
        badge_class: "yellow_color",
        description: "شريحة M1 Pro لأداء خارق، شاشة Liquid Retina XDR مبهرة، كاميرا FaceTime HD 1080p ونظام صوت من 6 مكبرات.",
        description_en: "M1 Pro chip for groundbreaking performance, breathtaking Liquid Retina XDR display, and up to 17 hours battery.",
        features: [
            "شريحة Apple M1 Pro لوحدة معالجة مركزية تصل إلى 10 نوى ووحدة معالجة رسومات حتى 16 نواة",
            "شاشة Liquid Retina XDR مقاس 14.2 إنش مع تباين فائق ونطاق ديناميكي مذهل",
            "ذاكرة موحدة سعة 16GB لإنجاز كل المهام بسرعة وسلاسة خيالية",
            "عمر بطارية يصل إلى 17 ساعة من العمل المتواصل وشحن سريع MagSafe 3"
        ],
        features_en: [
            "Apple M1 Pro chip with up to 10-core CPU and 16-core GPU",
            "14.2-inch Liquid Retina XDR display with extreme dynamic range",
            "16GB unified memory for ultra-smooth multi-tasking",
            "Up to 17 hours battery life with MagSafe 3 fast charging"
        ],
        specs: [
            { label: "المعالج", label_en: "Processor", value: "Apple M1 Pro 8-Core" },
            { label: "الذاكرة العشوائية", label_en: "RAM", value: "16 جيجابايت موحدة" },
            { label: "سعة التخزين", label_en: "SSD Storage", value: "512 جيجابايت SSD فائق السرعة" },
            { label: "الشاشة", label_en: "Display", value: "14.2 بوصة Liquid Retina XDR 120Hz" },
            { label: "المنافذ", label_en: "Ports", value: "Thunderbolt 4, HDMI, SDXC, MagSafe 3" }
        ]
    },
    {
        id: "sony_headphones",
        title: "سماعات سوني لاسلكية WH-1000XM4 مع خاصية إلغاء الضوضاء الفائقة",
        title_en: "Sony WH-1000XM4 Wireless Noise Canceling Headphones",
        price: 1149,
        old_price: 1399,
        discount: "18%",
        category: "السماعات والصوتيات",
        category_en: "Audio & Headphones",
        img: "img/h-1.png",
        gallery: ["img/h-1.png", "img/h-2.png", "img/h-3.png", "img/h-4.png"],
        colors: [
            { name: "أسود مطفي", name_en: "Matte Black", img: "img/h-1.png" },
            { name: "فضي بلاتيني", name_en: "Platinum Silver", img: "img/h-2.png" }
        ],
        rating: 4.8,
        reviews_count: 412,
        model: "WH1000XM4/B",
        seller: "متجر الصوتيات الذهبي",
        seller_en: "Golden Audio Store",
        badge: "اكسبرس",
        badge_class: "orange_color",
        description: "تقنية إلغاء الضوضاء الرائدة في الصناعة بمعالج QN1، صوت عالي الدقة Hi-Res، وعمر بطارية يصل إلى 30 ساعة مع شحن سريع.",
        description_en: "Industry-leading noise canceling with Dual Noise Sensor technology, Hi-Res Audio, and 30-hour battery life.",
        features: [
            "معالج إلغاء الضوضاء عالي الدقة QN1 وتقنية مستشعر الضوضاء الثنائي",
            "تقنية Speak-to-Chat للإيقاف التلقائي للموسيقى عند التحدث",
            "دعم ترميز LDAC لنقل بيانات صوتية بجودة Hi-Res اللاسلكية",
            "بطارية تدوم 30 ساعة مع إمكانية الحصول على 5 ساعات تشغيل بشحن 10 دقائق فقط"
        ],
        features_en: [
            "Industry-leading noise canceling with HD Noise Canceling Processor QN1",
            "Speak-to-chat technology automatically reduces volume during conversations",
            "Superior call quality with precise voice pickup technology",
            "Up to 30-hour battery life with quick charging (10 min charge for 5 hours)"
        ],
        specs: [
            { label: "عمر البطارية", label_en: "Battery Life", value: "حتى 30 ساعة مع ANC" },
            { label: "الاتصال", label_en: "Connectivity", value: "بلوتوث 5.0 مع دعم Multipoint" },
            { label: "الشحن", label_en: "Charging", value: "USB Type-C شحن سريع" },
            { label: "الميكروفون", label_en: "Microphone", value: "ميكروفونات مدمجة مع عزل الصوت" }
        ]
    },
    {
        id: "dior_sauvage",
        title: "عطر ديور سوفاج أو دو بارفيوم للرجال - 100 مل أصلي 100%",
        title_en: "Dior Sauvage Eau de Parfum for Men - 100ml Original",
        price: 549,
        old_price: 680,
        discount: "19%",
        category: "العطور والجمال",
        category_en: "Perfumes & Beauty",
        img: "img/e-1.png",
        gallery: ["img/e-1.png", "img/e-2.png", "img/of-1.png", "img/of-2.png"],
        colors: [],
        rating: 4.9,
        reviews_count: 520,
        model: "DIO-SAUV-EDP100",
        seller: "توكي للعطور الأصلية",
        seller_en: "Toki Fragrances",
        badge: "ماركت",
        badge_class: "green_color",
        description: "تركيبة عطرية ساحرة وذكورية تجمع بين انتعاش البرغموت الكالابري الحار ونفحات الفانيليا الحسية وخشب الأرز الفاخر.",
        description_en: "A powerfully fresh fragrance composition with Calabrian bergamot, Sichuan pepper, and noble Ambroxan.",
        features: [
            "عطر أصلي 100% مستورد من فرنسا بضمان متجر توكي الموثوق",
            "ثبات وفوحان فائق يدوم طوال اليوم بفضل تركيز Eau de Parfum",
            "مزيج متناغم من البرغموت، الفلفل الأسود، اللافندر، والأمبروكسان",
            "تصميم زجاجة أنيق مع غطاء مغناطيسي فاخر"
        ],
        features_en: [
            "100% authentic fragrance imported directly from France",
            "Long-lasting sillage and projection with Eau de Parfum concentration",
            "Signature blend of bergamot, pepper, lavender, and rich ambroxan",
            "Luxurious magnetic cap bottle design"
        ],
        specs: [
            { label: "الحجم", label_en: "Size", value: "100 مل" },
            { label: "التركيز", label_en: "Concentration", value: "Eau de Parfum (EDP)" },
            { label: "الجنس", label_en: "Gender", value: "رجالي" },
            { label: "العائلة العطرية", label_en: "Fragrance Family", value: "أروماتك - فوچير شرقي" }
        ]
    },
    {
        id: "nike_air_max",
        title: "حذاء نايكي أير ماكس 270 الرياضي للرجال أسود وأبيض مريح للجري",
        title_en: "Nike Air Max 270 Men's Running Shoes Black/White",
        price: 589,
        old_price: 749,
        discount: "21%",
        category: "الأحذية والرياضة",
        category_en: "Shoes & Sports",
        img: "img/sh1.png",
        gallery: ["img/sh1.png", "img/sh2.png", "img/sh3.png", "img/sh4.png"],
        colors: [
            { name: "أسود / أبيض", name_en: "Black / White", img: "img/sh1.png" },
            { name: "أحمر / أسود", name_en: "Red / Black", img: "img/sh2.png" }
        ],
        rating: 4.7,
        reviews_count: 318,
        model: "AH8050-002",
        seller: "ركن الرياضة توكي",
        seller_en: "Toki Sports Corner",
        badge: "اكسبرس",
        badge_class: "orange_color",
        description: "تصميم عصري مزود بوحدة كعب Air Max 270 الأكبر حجماً لامتصاص الصدمات وتوفير أقصى درجات الراحة والمرونة أثناء المشي والجري.",
        description_en: "Featuring Nike's biggest heel Air unit yet, delivering exceptional comfort and bold lifestyle design.",
        features: [
            "وحدة Air Max كبيرة في الكعب توفر توسيداً فائق النعومة طوال اليوم",
            "جزء علوي شبكي يسمح بالتهوية الممتازة وخفيف الوزن",
            "نعل خارجي من المطاط المتين يضمن ثباتاً محكماً على مختلف الأسطح",
            "تصميم جورب داخلي يمنح مقاساً محكماً ومريحاً للقدم"
        ],
        features_en: [
            "Large Max Air heel unit delivers responsive cushioning all day long",
            "Breathable woven mesh upper keeps feet cool and comfortable",
            "Durable rubber outsole provides superior multi-surface traction",
            "Inner-sleeve construction gives a personalized snug fit"
        ],
        specs: [
            { label: "المادة العلوية", label_en: "Upper Material", value: "قماش شبكي Mesh مطاطي ومريح" },
            { label: "النعل الداخلي", label_en: "Insole", value: "وسادة هوائية Max Air 270" },
            { label: "النعل الخارجي", label_en: "Outsole", value: "مطاط مرن مانع للانزلاق" },
            { label: "الاستخدام", label_en: "Usage", value: "رياضي / جري / كاجوال يومي" }
        ]
    },
    {
        id: "samsung_neo_qled_tv",
        title: "تلفزيون سامسونج 65 بوصة Neo QLED 4K سمارت ريسيفر مدمج و HDR 24X",
        title_en: "Samsung 65-inch Neo QLED 4K Smart TV Built-in Receiver HDR",
        price: 4599,
        old_price: 5999,
        discount: "23%",
        category: "التلفزيونات والأجهزة المنزلية",
        category_en: "TVs & Home Appliances",
        img: "img/tb.png",
        gallery: ["img/tb.png", "img/tb2.png", "img/tb3.png", "img/tb4.png"],
        colors: [],
        rating: 4.9,
        reviews_count: 96,
        model: "QA65QN85BAUXSA",
        seller: "توكي إلكترونيكس",
        seller_en: "Toki Electronics",
        badge: "بريمير",
        badge_class: "yellow_color",
        description: "تقنية Quantum Matrix الثورية مع معالج Neo Quantum 4K الذكي، صوت بتتبع الأجسام OTS وتصميم نحيف جداً NeoSlim.",
        description_en: "Revolutionary Quantum Matrix technology with AI Neo Quantum Processor 4K, Object Tracking Sound, and ultra-slim profile.",
        features: [
            "إضاءة دقيقة بفضل مصابيح Quantum Mini LED الصغيرة جداً لتباين مذهل",
            "معالج Neo Quantum Processor 4K بالذكاء الاصطناعي لتحسين جودة المشاهد",
            "معدل تحديث 120Hz مع دعم Motion Xcelerator Turbo+ لألعاب فائقة السلاسة",
            "نظام Tizen الذكي يدعم جميع تطبيقات المشاهدة (شاهد، نتفليكس، يوتيوب)"
        ],
        features_en: [
            "Quantum Mini LED creates great details in both the darkest and brightest scenes",
            "Neo Quantum Processor 4K with AI upscaling enhances every frame",
            "120Hz refresh rate with Motion Xcelerator Turbo+ for smooth gaming",
            "Tizen Smart TV OS with all top streaming applications built-in"
        ],
        specs: [
            { label: "حجم الشاشة", label_en: "Screen Size", value: "65 بوصة" },
            { label: "دقة العرض", label_en: "Resolution", value: "4K Ultra HD (3840 x 2160)" },
            { label: "معدل التحديث", label_en: "Refresh Rate", value: "120 هرتز حقيقي" },
            { label: "نظام التشغيل", label_en: "Operating System", value: "Tizen Smart OS" },
            { label: "المنافذ", label_en: "Ports", value: "4x HDMI 2.1, 2x USB, Optical, LAN, Wi-Fi 5" }
        ]
    },
    {
        id: "smart_air_fryer",
        title: "قلاية هوائية فيليبس XXL سعة 7.3 لتر مع تقنية إزالة الدهون وشاشة رقمية",
        title_en: "Philips Airfryer XXL 7.3L Smart Sensing Digital Display",
        price: 899,
        old_price: 1199,
        discount: "25%",
        category: "أدوات المطبخ والمنزل",
        category_en: "Kitchen & Home Appliances",
        img: "img/kt-1.png",
        gallery: ["img/kt-1.png", "img/kt-2.png", "img/kt-3.png", "img/kt-4.png"],
        colors: [],
        rating: 4.8,
        reviews_count: 230,
        model: "HD9650/91",
        seller: "توكي هوم",
        seller_en: "Toki Home",
        badge: "اكسبرس",
        badge_class: "orange_color",
        description: "طعام مقرمش ولذيذ بدهون أقل بنسبة تصل إلى 90%، سعة عائلية ضخمة تكفي دجاجة كاملة أو 1.4 كجم بطاطس مع برامج طهي تلقائية.",
        description_en: "Twin TurboStar technology removes fat from foods. XXL family size fits a whole chicken with preset smart digital programs.",
        features: [
            "تقنية Twin TurboStar الثورية لإزالة الدهون الزائدة من الطعام",
            "سعة XXL عائلية ضخمة تتسع لـ 6 وجبات كاملة في وقت واحد",
            "شاشة تحكم رقمية سريعة مع 5 برامج طهي مسبقة الإعداد",
            "تنظيف سهل وسريع مع سلة QuickClean المطلية بمادة مانعة للالتصاق"
        ],
        features_en: [
            "Twin TurboStar technology captures excess fat for healthier meals",
            "XXL family size easily handles a whole chicken or 1.4kg of fries",
            "Digital display with 5 preset cooking programs",
            "QuickClean basket with non-stick mesh cleans up in 90 seconds"
        ],
        specs: [
            { label: "السعة", label_en: "Capacity", value: "7.3 لتر (1.4 كجم)" },
            { label: "القدرة الكهربائية", label_en: "Power", value: "2225 واط" },
            { label: "التحكم في الحرارة", label_en: "Temperature Range", value: "40°C - 200°C" },
            { label: "الضمان", label_en: "Warranty", value: "ضمان سنتين شامل من الوكيل" }
        ]
    },
    {
        id: "men_polo_shirt",
        title: "قميص بولو رجالي كاجوال قطن 100% عالي الجودة مقاس مريح",
        title_en: "Men's Casual 100% Premium Cotton Polo Shirt",
        price: 149,
        old_price: 199,
        discount: "25%",
        category: "أزياء رجالية",
        category_en: "Men's Fashion",
        img: "img/men-1.png",
        gallery: ["img/men-1.png", "img/men-2.png", "img/men-3.png", "img/men-4.png"],
        colors: [
            { name: "كحلي", name_en: "Navy", img: "img/men-1.png" },
            { name: "أبيض", name_en: "White", img: "img/men-2.png" },
            { name: "رمادي", name_en: "Gray", img: "img/men-3.png" }
        ],
        rating: 4.6,
        reviews_count: 185,
        model: "POLO-MEN-2026",
        seller: "توكي فاشون",
        seller_en: "Toki Fashion",
        badge: "ماركت",
        badge_class: "green_color",
        description: "خامة قطنية فائقة النعومة ومسامية تمنحك الانتعاش والأناقة طوال اليوم في الإطلالات الكاجوال والرسمية.",
        description_en: "Soft and breathable premium cotton polo designed for all-day comfort and timeless casual elegance.",
        features: [
            "مصنوع من قطن نقي 100% ممتاز ومقاوم للانكماش",
            "ياقة بولو كلاسيكية أنيقة مع أزرار متينة ومتقنة",
            "قصة مريحة Regular Fit تناسب جميع الأجسام",
            "ثبات ألوان فائق يتحمل الغسيل المتكرر"
        ],
        features_en: [
            "100% premium combed cotton resists shrinking and fading",
            "Classic ribbed collar with reinforced double-stitched buttons",
            "Comfortable regular fit for everyday versatile wear",
            "Easy care and machine washable"
        ],
        specs: [
            { label: "الخامة", label_en: "Fabric", value: "قطن نقي 100%" },
            { label: "نوع الأكمام", label_en: "Sleeve Type", value: "نصف كم Short Sleeve" },
            { label: "تعليمات الغسيل", label_en: "Care Instructions", value: "غسيل آلي بماء بارد" }
        ]
    },
    {
        id: "women_handbag",
        title: "حقيبة يد نسائية فاخرة من الجلد الطبيعي بتصميم عصري مع حزام كتف",
        title_en: "Luxury Genuine Leather Women Handbag with Shoulder Strap",
        price: 349,
        old_price: 499,
        discount: "30%",
        category: "أزياء نسائية وحقائب",
        category_en: "Women's Fashion & Bags",
        img: "img/ns-1.png",
        gallery: ["img/ns-1.png", "img/ns-2.png", "img/ns-3.png", "img/ns-4.png"],
        colors: [
            { name: "بني عسلي", name_en: "Tan Brown", img: "img/ns-1.png" },
            { name: "أسود كلاسيك", name_en: "Classic Black", img: "img/ns-2.png" }
        ],
        rating: 4.8,
        reviews_count: 290,
        model: "BAG-LUX-2026",
        seller: "توكي بوتيك",
        seller_en: "Toki Boutique",
        badge: "اكسبرس",
        badge_class: "orange_color",
        description: "حقيبة أنيقة مصنوعة يدوياً من أجود خامات الجلد الطبيعي، تحتوي على جيوب داخلية متعددة لتنظيم أغراضك بسهولة وأناقة.",
        description_en: "Handcrafted from genuine leather with organized multi-compartment interior and adjustable crossbody strap.",
        features: [
            "جلد طبيعي متين وناعم الملمس مقاوم للخدوش والتآكل",
            "حزام كتف قابل للفصل والتعديل للاستخدام كحقيبة كروس أو يد",
            "إكسسوارات وسحابات معدنية ذهبية مقاومة للصدأ",
            "مساحة داخلية واسعة مقسمة بذكاء لجميع المستلزمات اليومية"
        ],
        features_en: [
            "Genuine leather construction with scratch-resistant finish",
            "Detachable adjustable shoulder strap for shoulder or crossbody wear",
            "Polished gold-tone rustproof hardware and smooth zippers",
            "Spacious multi-pocket interior fits phone, wallet, cosmetics and keys"
        ],
        specs: [
            { label: "الخامة", label_en: "Material", value: "جلد طبيعي 100%" },
            { label: "الأبعاد", label_en: "Dimensions", value: "30 سم × 22 سم × 12 سم" },
            { label: "نوع الإغلاق", label_en: "Closure Type", value: "سحاب معدني + قفل مغناطيسي" }
        ]
    }
];

// Helper to get product by ID
function getProductById(id) {
    if (!id) return TOKI_PRODUCTS[0];
    var found = TOKI_PRODUCTS.find(function(p) { return p.id === id; });
    return found || TOKI_PRODUCTS[0];
}
