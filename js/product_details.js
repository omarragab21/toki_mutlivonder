// Dynamic Product Details Loader for Toki Marketplace
(function() {
    'use strict';

    var galleryTopSwiper = null;
    var galleryThumbsSwiper = null;

    function initProductDetailsPage() {
        if (typeof TOKI_PRODUCTS === 'undefined') return;

        var urlParams = new URLSearchParams(window.location.search);
        var prodId = urlParams.get('id');
        var product = getProductById(prodId);

        var isAr = document.documentElement.lang === 'ar' || !document.documentElement.lang;

        var title = isAr ? product.title : product.title_en;
        var category = isAr ? product.category : product.category_en;
        var seller = isAr ? product.seller : product.seller_en;
        var desc = isAr ? product.description : product.description_en;
        var features = isAr ? product.features : product.features_en;
        var priceFormatted = parseFloat(product.price).toFixed(2);
        var oldPriceFormatted = parseFloat(product.old_price).toFixed(2);
        var currency = isAr ? 'رس' : 'SAR';

        // 1. Page Title & Meta
        document.title = title + ' - ' + (isAr ? 'متجر توكي' : 'Toki');

        // 2. Breadcrumbs
        var $breadcrumb = $('.breadcrumb');
        if ($breadcrumb.length) {
            var homeLink = isAr ? 'index.html' : 'index_en.html';
            var catLink = isAr ? 'category.html' : 'category_en.html';
            $breadcrumb.html(
                '<li class="breadcrumb-item"><a href="' + homeLink + '">' + (isAr ? 'الرئيسية' : 'Home') + '</a></li>' +
                '<li class="breadcrumb-item"><a href="' + catLink + '">' + category + '</a></li>' +
                '<li class="breadcrumb-item active" aria-current="page">' + title + '</li>'
            );
        }

        // 3. Product Name & Descriptions
        $('.product__name__details').text(title);
        $('.product__choose__card > p').text(desc);
        $('.model__details').text((isAr ? 'رقم الموديل : ' : 'Model : ') + product.model);
        $('.buyer__name span').text((isAr ? 'البائع : ' : 'Seller : ') + seller);

        // 4. Rating
        $('.product__rate__num small').text(product.reviews_count + (isAr ? ' تقييم' : ' reviews'));

        // 5. Prices
        $('.before_sale del').text(oldPriceFormatted + ' ' + currency);
        $('.before_sale strong').text(priceFormatted + ' ' + currency);

        // 6. Colors Selection
        if (product.colors && product.colors.length) {
            var colorsHtml = '';
            product.colors.forEach(function(c, i) {
                var cName = isAr ? c.name : c.name_en;
                var activeCls = i === 0 ? 'border: 2px solid #fa5000;' : '';
                colorsHtml += 
                    '<div class="color__card" style="cursor: pointer; ' + activeCls + '" onclick="selectColor(this)">' +
                        '<img src="' + c.img + '" alt="">' +
                        '<span>' + cName + '</span>' +
                    '</div>';
            });
            $('.color__choose_wrap').html(colorsHtml);
            $('.count__wrapper:has(.color__choose_wrap)').show();
        } else {
            $('.count__wrapper:has(.color__choose_wrap)').hide();
        }

        // 7. Gallery Slides
        if (product.gallery && product.gallery.length) {
            var topSlides = '';
            var thumbSlides = '';
            product.gallery.forEach(function(imgSrc) {
                topSlides += '<a href="' + imgSrc + '" class="swiper-slide" style="background-image:url(' + imgSrc + ')" data-fancybox="gallery"></a>';
                thumbSlides += '<div class="swiper-slide" style="background-image:url(' + imgSrc + ')"></div>';
            });

            $('.gallery-top .swiper-wrapper').html(topSlides);
            $('.gallery-thumbs .swiper-wrapper').html(thumbSlides);

            // Re-init Swipers
            try {
                if (typeof Swiper !== 'undefined') {
                    if (galleryTopSwiper) galleryTopSwiper.destroy(true, true);
                    if (galleryThumbsSwiper) galleryThumbsSwiper.destroy(true, true);

                    galleryThumbsSwiper = new Swiper('.gallery-thumbs', {
                        spaceBetween: 8,
                        slidesPerView: Math.min(product.gallery.length, 4),
                        freeMode: true,
                        watchSlidesVisibility: true,
                        watchSlidesProgress: true,
                    });
                    galleryTopSwiper = new Swiper('.gallery-top', {
                        spaceBetween: 10,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        thumbs: {
                            swiper: galleryThumbsSwiper
                        }
                    });
                }
            } catch(e) {}
        }

        // 8. Tabs Features & Overview
        if (features && features.length) {
            var featHtml = '';
            features.forEach(function(f) {
                featHtml += '<li>' + f + '</li>';
            });
            $('.features__list').html(featHtml);
        }
        $('#pro__details__tabOne .feature__one:nth-child(2) p').text(desc);

        // 9. Specifications Table
        if (product.specs && product.specs.length) {
            var specsHtml = '';
            product.specs.forEach(function(s) {
                var sLabel = isAr ? s.label : s.label_en;
                specsHtml += 
                    '<div class="col-12 col-lg-6">' +
                        '<div class="specific__tr">' +
                            '<div class="specific__col col__grey">' + sLabel + '</div>' +
                            '<div class="specific__col col__black">' + s.value + '</div>' +
                        '</div>' +
                    '</div>';
            });
            $('.specific__row').html(specsHtml);
        }

        // 10. Related / Bought Together Products
        var related = TOKI_PRODUCTS.filter(function(p) { return p.id !== product.id; }).slice(0, 4);
        if (related.length && $('.pro__details__slider').length) {
            var relHtml = '';
            related.forEach(function(rp, idx) {
                var rpTitle = isAr ? rp.title : rp.title_en;
                var rpPrice = parseFloat(rp.price).toFixed(2);
                relHtml += 
                    '<div class="one__item_pro">' +
                        '<div class="other__card_item">' +
                            '<input type="checkbox" class="checkbox__mark" checked>' +
                            '<div class="other_card_img">' +
                                '<a href="' + (isAr ? 'product_details.html' : 'product_details_en.html') + '?id=' + rp.id + '">' +
                                    '<img src="' + rp.img + '" alt="">' +
                                '</a>' +
                            '</div>' +
                            '<a href="' + (isAr ? 'product_details.html' : 'product_details_en.html') + '?id=' + rp.id + '" style="text-decoration:none; color:inherit;">' +
                                '<h3 class="other__pro__title">' + rpTitle + '</h3>' +
                            '</a>' +
                            '<div class="other__new__price">' + rpPrice + ' ' + currency + '</div>' +
                            '<div class="bottom__wrapper">' +
                                '<div class="ex__type main__btn ' + rp.badge_class + '">' + rp.badge + '</div>' +
                            '</div>' +
                        '</div>' +
                        (idx < related.length - 1 ? '<div class="plusSign"><i class="fa fa-plus"></i></div>' : '') +
                    '</div>';
            });
            $('.pro__details__slider').html(relHtml);
        }

        // 11. Bind Add to Cart action specifically for this product
        $(document).off('click', '.add__cart__btn, .second__cart__btn').on('click', '.add__cart__btn, .second__cart__btn', function(e) {
            e.preventDefault();
            var qty = parseInt($('.number__spinner input, .pl-ns-value').val()) || 1;
            if (window.tokiCart) {
                window.tokiCart.add({
                    id: product.id,
                    title: title,
                    price: product.price,
                    img: product.img,
                    qty: qty
                });
            }
        });
    }

    window.selectColor = function(el) {
        $('.color__card').css('border', 'none');
        $(el).css('border', '2px solid #fa5000');
    };

    $(document).ready(function() {
        initProductDetailsPage();
    });
})();
