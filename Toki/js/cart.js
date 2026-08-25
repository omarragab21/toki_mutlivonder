// Toki Shopping Cart Engine & Drawer Manager
(function() {
    'use strict';

    var STORAGE_KEY = 'toki_cart';

    // Get current cart
    function getCart() {
        try {
            var data = localStorage.getItem(STORAGE_KEY);
            return data ? JSON.parse(data) : [];
        } catch(e) {
            return [];
        }
    }

    // Save cart & update UI
    function saveCart(items) {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
        } catch(e) {}
        updateBadges();
        renderCartDrawer();
    }

    // Get total items count
    function getTotalCount() {
        var items = getCart();
        return items.reduce(function(total, item) {
            return total + (item.qty || 1);
        }, 0);
    }

    // Get total price
    function getTotalPrice() {
        var items = getCart();
        return items.reduce(function(total, item) {
            var price = parseFloat(item.price) || 0;
            return total + (price * (item.qty || 1));
        }, 0);
    }

    // Update badges in header & mobile nav
    function updateBadges() {
        var count = getTotalCount();
        $('.num-cart').text(count);
        $('.cart__num').text(count);
        $('.toki-cart-title span.badge-count').text(count);

        if (count > 0) {
            $('.num-cart, .cart__num').show();
        } else {
            $('.num-cart, .cart__num').text('0');
        }
    }

    // Is current page Arabic
    function isArabic() {
        return document.documentElement.lang === 'ar' || !document.documentElement.lang;
    }

    // Inject Drawer Markup if needed
    function ensureDrawerMarkup() {
        if ($('.toki-cart-drawer').length) return;

        var ar = isArabic();
        var html = 
            '<div class="toki-cart-overlay"></div>' +
            '<div class="toki-cart-drawer">' +
                '<div class="toki-cart-header">' +
                    '<h3 class="toki-cart-title">' +
                        '<i class="fa-solid fa-bag-shopping" style="color: #fa5000;"></i> ' +
                        (ar ? 'عربة التسوق' : 'Shopping Cart') +
                        ' <span class="badge-count">0</span>' +
                    '</h3>' +
                    '<button class="toki-cart-close" title="' + (ar ? 'إغلاق' : 'Close') + '">' +
                        '<i class="fa-solid fa-xmark"></i>' +
                    '</button>' +
                '</div>' +
                '<div class="toki-cart-body" id="tokiCartItemsContainer"></div>' +
                '<div class="toki-cart-footer" id="tokiCartFooter"></div>' +
            '</div>' +
            '<div class="toki-cart-toast" id="tokiCartToast">' +
                '<i class="fa-solid fa-circle-check"></i> ' +
                '<span>' + (ar ? 'تمت إضافة المنتج إلى السلة بنجاح' : 'Product added to cart successfully') + '</span>' +
            '</div>';

        $('body').append(html);
    }

    // Render Drawer Content
    function renderCartDrawer() {
        var items = getCart();
        var ar = isArabic();
        var $body = $('#tokiCartItemsContainer');
        var $footer = $('#tokiCartFooter');

        if (!$body.length) return;

        if (items.length === 0) {
            $body.html(
                '<div class="toki-cart-empty">' +
                    '<i class="fa-solid fa-basket-shopping"></i>' +
                    '<h4>' + (ar ? 'عربة التسوق فارغة' : 'Your cart is empty') + '</h4>' +
                    '<p>' + (ar ? 'لم تقم بإضافة أي منتجات إلى سلتك حتى الآن.' : 'You have not added any products to your cart yet.') + '</p>' +
                    '<a href="' + (ar ? 'category.html' : 'category_en.html') + '" class="btn-shop-now" onclick="window.tokiCart.close()">' +
                        (ar ? 'تصفح المنتجات الآن' : 'Browse Products Now') +
                    '</a>' +
                '</div>'
            );
            $footer.html('').hide();
            return;
        }

        var itemsHtml = '';
        items.forEach(function(item, idx) {
            var itemTotal = (parseFloat(item.price) * (item.qty || 1)).toFixed(2);
            itemsHtml += 
                '<div class="toki-cart-item" data-id="' + item.id + '">' +
                    '<img src="' + (item.img || 'img/p-1.png') + '" alt="" class="toki-cart-item-img">' +
                    '<div class="toki-cart-item-info">' +
                        '<h4 class="toki-cart-item-title">' + (item.title || (ar ? 'منتج من متجر توكي' : 'Toki Product')) + '</h4>' +
                        '<div class="toki-cart-item-price">' + (parseFloat(item.price) || 0).toFixed(2) + ' ' + (ar ? 'ر.س' : 'SAR') + '</div>' +
                        '<div class="toki-cart-item-controls">' +
                            '<div class="toki-qty-btn-group">' +
                                '<button type="button" class="toki-qty-btn" onclick="window.tokiCart.updateQty(\'' + item.id + '\', -1)">-</button>' +
                                '<span class="toki-qty-val">' + (item.qty || 1) + '</span>' +
                                '<button type="button" class="toki-qty-btn" onclick="window.tokiCart.updateQty(\'' + item.id + '\', 1)">+</button>' +
                            '</div>' +
                            '<button type="button" class="toki-item-remove" onclick="window.tokiCart.remove(\'' + item.id + '\')" title="' + (ar ? 'حذف' : 'Remove') + '">' +
                                '<i class="fa-regular fa-trash-can"></i> ' + (ar ? 'حذف' : 'Remove') +
                            '</button>' +
                        '</div>' +
                    '</div>' +
                '</div>';
        });

        $body.html(itemsHtml);

        var subtotal = getTotalPrice().toFixed(2);
        var currency = ar ? 'ر.س' : 'SAR';

        $footer.html(
            '<div class="toki-cart-summary-row">' +
                '<span>' + (ar ? 'المجموع الفرعي' : 'Subtotal') + '</span>' +
                '<span>' + subtotal + ' ' + currency + '</span>' +
            '</div>' +
            '<div class="toki-cart-summary-row">' +
                '<span>' + (ar ? 'رسوم التوصيل' : 'Delivery Fee') + '</span>' +
                '<span style="color: #27ae60;">' + (ar ? 'مجاناً' : 'Free') + '</span>' +
            '</div>' +
            '<div class="toki-cart-summary-row total">' +
                '<span>' + (ar ? 'الإجمالي' : 'Total') + '</span>' +
                '<span class="price">' + subtotal + ' ' + currency + '</span>' +
            '</div>' +
            '<a href="' + (ar ? 'cart.html' : 'cart_en.html') + '" class="btn-toki-checkout">' +
                '<i class="fa-solid fa-credit-card"></i> ' +
                (ar ? 'متابعة الدفع والشراء' : 'Proceed to Checkout') +
            '</a>'
        ).show();
    }

    // Open Cart Drawer
    function openCart() {
        ensureDrawerMarkup();
        renderCartDrawer();
        $('.toki-cart-overlay').addClass('active');
        $('.toki-cart-drawer').addClass('active');
        $('body').css('overflow', 'hidden');
    }

    // Close Cart Drawer
    function closeCart() {
        $('.toki-cart-overlay').removeClass('active');
        $('.toki-cart-drawer').removeClass('active');
        $('body').css('overflow', '');
    }

    // Show Toast
    function showToast(msg) {
        var $toast = $('#tokiCartToast');
        if (msg) $toast.find('span').text(msg);
        $toast.addClass('show');
        setTimeout(function() {
            $toast.removeClass('show');
        }, 2500);
    }

    // Add Item
    function addToCart(item) {
        var items = getCart();
        var existing = items.find(function(i) { return i.id === item.id; });
        if (existing) {
            existing.qty = (existing.qty || 1) + (item.qty || 1);
        } else {
            items.push({
                id: item.id || ('prod_' + Date.now()),
                title: item.title || 'أبل ساعة سيريس 7',
                price: parseFloat(item.price) || 1754,
                img: item.img || 'img/p-1.png',
                qty: item.qty || 1
            });
        }
        saveCart(items);
        showToast();
        openCart();
    }

    // Remove Item
    function removeFromCart(id) {
        var items = getCart().filter(function(i) { return i.id !== id; });
        saveCart(items);
    }

    // Update Qty
    function updateQty(id, delta) {
        var items = getCart();
        var item = items.find(function(i) { return i.id === id; });
        if (item) {
            item.qty = (item.qty || 1) + delta;
            if (item.qty <= 0) {
                items = items.filter(function(i) { return i.id !== id; });
            }
        }
        saveCart(items);
    }

    // Public API
    window.tokiCart = {
        get: getCart,
        add: addToCart,
        remove: removeFromCart,
        updateQty: updateQty,
        open: openCart,
        close: closeCart,
        updateBadges: updateBadges,
        clear: function() { saveCart([]); }
    };

    // Event Handlers
    $(document).ready(function() {
        ensureDrawerMarkup();
        updateBadges();

        // Cart trigger in Header & Mobile Nav
        $(document).on('click', '.account_link:has(.num-cart), .tab-shape:has(.cart__num), .bag__icon, .num-cart, .cart__num, [data-open-cart]', function(e) {
            e.preventDefault();
            openCart();
        });

        // Close button & Overlay
        $(document).on('click', '.toki-cart-close, .toki-cart-overlay', function(e) {
            e.preventDefault();
            closeCart();
        });

        // Add to Cart on Product Details Page
        $(document).on('click', '.second__cart__btn', function(e) {
            e.preventDefault();
            var title = $('.product__details__content h3, .product__details__content .main-title').first().text().trim() || 'أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء';
            var priceText = $('.product__details__content .new__price').first().text().replace(/[^\d.]/g, '') || '1754';
            var qty = parseInt($('.number__spinner input').val()) || 1;
            var img = $('.product__slider__main img, .pro__details__slider img').first().attr('src') || 'img/p-1.png';

            addToCart({
                id: 'apple_watch_7',
                title: title,
                price: parseFloat(priceText) || 1754,
                qty: qty,
                img: img
            });
        });
    });

})();
