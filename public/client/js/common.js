/*cart*/
    $('body').on('click', '.add-to-cart', function(e) {
        e.preventDefault();


        var id = $(this).data('id'),
            size = $(this).closest('.item__cont').find('.radio:checked').val();
        if (size) {
            $.ajax({
                url: '/cart/add',
                data: { id: id, size: size },
                type: 'GET',
                success: function(res) {
                    if (!res) {
                        alert('Такого размера нет!');
                    } else {
                        showCart(res);
                        let count = $('.header_line__basket__count').html();
                        $('.header_line__basket__count').html(Number(count) + 1);
                    }
                },
                error: function() {
                    alert('Error!');
                }
            });
        } else {
            radioClick($(this).closest('.item__cont'));
        }
    });

    function radioClick(block) {
        $('.index__items ').find('.radio').removeClass('error').prop('checked', false);
        block.find('.radio').addClass('error');
    };

    $('.radio').on('click', function() {
        $('.index__items, .product__right__size').find('.radio').removeClass('error');
    });

    $('body').on('click', '.delete', function() {
        var id_array = $(this).data('id_array');
        $.ajax({
            url: '/cart/del-item',
            data: { id_array: id_array },
            type: 'GET',
            success: function(res) {
                if (!res) alert('Ошибка!');
                showCart(res);
                let count = $('.header_line__basket__count').html();
                $('.header_line__basket__count').html(Number(count) - 1);
            },
            error: function() {
                alert('Error!');
            }
        });
    });

    $('body').on('click', '.delete2', function() {
        var id_array = $(this).data('id_array');
        $.ajax({
            url: '/cart/del-item',
            data: { id_array: id_array },
            type: 'GET',
            success: function(res) {
                if (!res) alert('Ошибка!');
                location.reload();
            },
            error: function() {
                alert('Error!');
            }
        });
    });



    function showCart(cart) {
        $('.modal__sele .sale__cont').html(cart);
        $('.modal__sele').fadeIn();
    }

    function getCart() {
        $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function(res) {
                if (!res) alert('Ошибка!');
                showCart(res);
            },
            error: function() {
                alert('Error!');
            }
        });
        return false;
    }



    $('.header_line__basket').on('click', function() {
        getCart();
    });

    $(".overlay").on("focusout", function() {
        var id_product = $(this).data('toggle');
        var val = $(this).val();

        var overlay2 = $('.overlay');
        var nal2 = 0; //постоянная
        overlay2.each(function() {
            nal2 = nal2 + Number(this.value);
        });
        $('.nal').text(nal2);

        $.ajax({
            url: '/cart/overlay',
            data: {
                id_product: id_product,
                val: val
            },
            type: 'POST',
            success: function(res) {

            },
            error: function() {
                alert('Error!');
            }
        });
    });
    /*cart end*/


    /*SEARCH*/
    if ($('*').is('#typeahead')) {
        var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                wildcard: '%QUERY',
                url: PATH + '/search/typeahead?query=%QUERY'
            }
        });

        products.initialize();

        $("#typeahead").typeahead({
            // hint: false,
            highlight: true
        }, {
            name: 'products',
            display: 'title',
            limit: 10,
            source: products
        });

        $('#typeahead').bind('typeahead:select', function(ev, suggestion) {
            // console.log(suggestion);
            window.location = PATH + '/search/?s=' + encodeURIComponent(suggestion.title);
        });

    }
    /*SEARCH*/


    ref_id = '';
    /*Поиск город и областей*/
    if ($('*').is('.cart')) {
        var cities = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                wildcard: '%QUERY',
                url: PATH + '/cart/cities?query=%QUERY'
            }
        });

        cities.initialize();

        $("#order-city").typeahead({
            // hint: false,
            highlight: true
        }, {
            name: 'cities',
            display: 'name',
            limit: 12,
            source: cities
        });

        $('#order-city').bind('typeahead:select', function(ev, suggestion) {
            // console.log(suggestion);
            $('#order-department').attr("data-ref", suggestion.Ref);
            $(".field-order-department .tt-menu").remove();
            ref_id = $('#order-department').attr("data-ref");

            branches = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                identify: function(obj) { return obj.team; },
                remote: {
                    wildcard: '%QUERY',
                    url: PATH + 'cart/branches?query=%QUERY&id=' + ref_id + ''
                }
            });

            function nflTeamsWithDefaults(q, sync) {
                if (q === '') {
                    sync(nflTeams.all()); // This is the only change needed to get 'ALL' items as the defaults
                } else {
                    nflTeams.search(q, sync);
                }
            }

            branches.initialize();

            $("#order-department").typeahead({
                minLength: 0,
                highlight: true
            }, {
                name: 'cities',
                display: 'DescriptionRu',
                limit: 1000,
                source: branches
            });

            $('#order-department').bind('typeahead:select', function(ev, suggestion) {

            });
        });

        //department




    }
    /*End Поиск город и областей*/

    $('.filter__item__title').click(function() {
        $(this).toggleClass('rt180').siblings('ul').slideToggle();
    });

    //Клик вне блока закрытие
    $(".header_line__logo__mob, .filter__mobtitle__close").click(function() {
        $('.filter__cont').toggleClass('filter__cont__active');
        $('.filter').animate({ width: 'toggle' });
        $('body').toggleClass('hidden');
        $(document).mouseup(function(e) {
            var container = $(".filter");
            if (container.has(e.target).length === 0) {
                container.fadeOut(300);
                $('.filter__cont').removeClass('filter__cont__active');
                $('body').removeClass('hidden');

            }
        });
    });

    $(document).ready(function() {
        $(".carousel2").owlCarousel({
            items: 7,
            loop: false,
            smartSpeed: 1000,
            autoWidth: true,
            margin: 10,
            nav: true,
            autoplay: false,
            navText: ['<div class="slider-control slider-control-left"></div>', '<div class="slider-control slider-control-right"></div>'],
            itemsDesktop: true,
            itemsDesktopSmall: true,
            itemsTablet: true,
            itemsMobile: true,
            responsiveClass: true,
            lazyLoad: true,
            center: false,
            responsive: {
                0: {
                    items: 2,
                },
                550: {
                    items: 2,
                },
                850: {
                    items: 3
                },
                1100: {
                    items: 6
                }
            }
        });
    });




    /*Слайдер карточки товара*/

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var slidesPerPage = 5;
    var syncedSecondary = true;

    sync1
        .owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
            ]
        })
        .on("changed.owl.carousel", syncPosition);

    sync2
        .on("initialized.owl.carousel", function() {
            sync2
                .find(".owl-item")
                .eq(0)
                .addClass("current");
        })
        .owlCarousel({
            items: slidesPerPage,
            dots: false,
            nav: true,
            smartSpeed: 200,
            slideSpeed: 500,
            margin: 10,
            slideBy: slidesPerPage,
            responsiveRefreshRate: 100,
            responsive: {
                0: {
                    items: 2
                },
                350: {
                    items: 3
                },
                400: {
                    items: 4
                },
                550: {
                    items: 5
                }
            }
        })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find(".owl-item.active").length - 1;
        var start = sync2
            .find(".owl-item.active")
            .first()
            .index();
        var end = sync2
            .find(".owl-item.active")
            .last()
            .index();

        if (current > end) {
            sync2.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
            sync2.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data("owl.carousel").to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data("owl.carousel").to(number, 300, true);
    });

    /*Слайдер карточки товара*/

    /*Modal*/

    $('.sale__head__img, .sale__buttons__button ').on('click', function() {
        $('.modal__sele').fadeOut();
    });


    $(document).mouseup(function(e) { // событие клика по веб-документу
        var div = $(".sale"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            &&
            div.has(e.target).length === 0) { // и не по его дочерним элементам
            if ($('.modal__sele').css('display') !== 'none') {
                $('.modal__sele').fadeOut();
            }

        }
    });


    /*Modal*/

    /*радио кнопки*/
    $('#order-payment label:last-child').click(function() {
        $('.cart__item__input__info').show(500);
    });

    $('#order-payment label:first-child').click(function() {
        $('.cart__item__input__info').hide(500);
    });

    /* filters */
    $('body').on('change', '.filter input', function() {
        var checked = $('.filter__items input:checked'),
            data = '';

        checked.each(function() {
            data += this.value + ',';
        });
        var min_price = $(this).closest('.filter__items').find('.min_price').val();
        var max_price = $(this).closest('.filter__items').find('.max_price').val();
        var param = {};
        if (min_price) {
            param.min_price = min_price
        }

        if (max_price) {
            param.max_price = max_price
        }

        if (data) {
            param.filter = data
        }
        if (data || min_price || max_price) {
            $.ajax({
                //шлем данные на текущую страницы
                url: location.href,
                data: param,
                type: 'GET',
                beforeSend: function() {
                    $('.preloader').fadeIn(300, function() {
                        $('.index__cont').hide();
                    });
                },
                success: function(res) {
                    //delay(500) задержка в пол сикуны
                    $('.preloader').delay(500).fadeOut('slow', function() {
                        $('.index__cont').html(res).fadeIn(300);
                        if (data) {
                            var url = location.search.replace(/filter(.+?)(&|$)/g, ''); //$2
                            var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                            newURL = newURL.replace('&&', '&');
                            newURL = newURL.replace('?&', '?');
                            history.pushState({}, '', newURL);
                        } else {
                            var url = location.search.replace(/filter(.+?)(&|$)/g, ''); //$2
                            history.pushState({}, '', url);
                        }

                        if (min_price) {
                            var min = location.search.replace(/min_price(.+?)(&|$)/g, ''); //$2
                            var minURL = location.pathname + min + (location.search ? "&" : "?") + "min_price=" + min_price;
                            minURL = minURL.replace('&&', '&');
                            minURL = minURL.replace('?&', '?');
                            history.pushState({}, '', minURL);
                        } else {
                            var min = location.search.replace(/min_price(.+?)(&|$)/g, ''); //$2
                            history.pushState({}, '', min);
                        }

                        if (max_price) {
                            var max = location.search.replace(/max_price(.+?)(&|$)/g, ''); //$2
                            var maxURL = location.pathname + max + (location.search ? "&" : "?") + "max_price=" + max_price;
                            maxURL = maxURL.replace('&&', '&');
                            maxURL = maxURL.replace('?&', '?');
                            history.pushState({}, '', maxURL);
                        } else {
                            var max = location.search.replace(/max_price(.+?)(&|$)/g, ''); //$2
                            history.pushState({}, '', max);
                        }
                    });
                },
                error: function() {
                    alert('Ошибка!');
                }
            });
        } else {
            window.location = location.pathname;
        }
    })

    /* filters end */

    //переместить назвние продукта

    if ($(window).width() < 1100) {
        $(".product_cont").before($(".product__right__name"));
        $(".product__right__values__value__rec p").text("ррц:");
    }

    //маска номера в оформлении заказа
    if ($("#order-phone").length) {
        $("#order-phone").mask("+38(999) 99-99-999");
    }


    if ($(window).width() <= 800) {
        if (!$("#category").length) {
            $('.header_line').addClass('header_line_not');
        }
    }

    //увеличение фотографии товара
    if ($(".lightgallery").length) {
        $('#sync1').lightGallery({
            selector: '.item'
        });
    }

    // //auch
    // $('body').on('click', '.header_line__button, .banner_container__button', function () {
    //     $('.auch').fadeIn(300);
    // });
    // $('body').on('click', '.auch_cont__close', function() {
    //     $('.auch').fadeOut(300);
    // });
    // $(document).mouseup(function (e) {
    //     if (!$('.auch_cont').is(e.target) && $('.auch_cont').has(e.target).length === 0) {
    //         let style = $('.auch').attr('style');
    //         if (style == 'display: block;') {
    //             $('.auch').fadeOut(300);
    //         }
    //     }
    // });

    $(".header_line__menu, .header_mob").on("click", "a.hash", function (event) {
        event.preventDefault();

        var id = $(this).attr('href'),

            top = $(id).offset().top;

        $('body,html').animate({ scrollTop: top }, 1000);
    });

    $('.select-default').click(function () {
        $(this).siblings('.select-drops').slideToggle();
    });

    $(document).mouseup(function (e) {
        if (!$('.index__sort').is(e.target) && $('.index__sort').has(e.target).length === 0) {
            // let style = $('.auch').attr('style');
            // if (style == 'display: block;') {
            //     $('.auch').fadeOut(300);
            // }
            $('.select-drops').hide();
        }
    });

$(document).ready(function() {
    function openModal() {
        $('#overlay').fadeIn(400,
            function(){
                $('#modal_form')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '40%'}, 200);
            });
    }

    setTimeout(function() {
        openModal();
    }, 5000);

    $('#modal_close, #overlay').click( function(){
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                }
            );

        setTimeout(function() {
            openModal();
        }, 50000);
    });

    $('#contactForm').click(function (e) {
        e.preventDefault();
        $('#successSubmit').hide();
        $('#errorSubmit').hide();

        $('#loader').show();

        ga('send', 'event', 'form', 'submit');

        let name = $('#name').val();
        let phone = $('#phone').val();
        let message = $('#message').val();

        let data = {
            name: name,
            phone: phone,
            notes: message,
        };

        const url = Router.route('order', data);

        axios.post(url)
            .then((data) => {
                $('#loader').hide();
                $('#errorSubmit').hide();
                $('#successSubmit').show();

                setTimeout(() => {
                    location.reload();
                }, 1500);
            }).catch(({ response: { data: { errors } } }) => {
            $('#loader').hide();
            $('#successSubmit').hide();
            $('#errorSubmit').show();
        });
    });
});
