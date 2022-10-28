 var app = {
            mgs_type: "popup",
            enablePopup: true,
            popupDuration: 6,
            onReady: function(d, a, e, f, t) {
                a = Array.isArray(a) ? a : [a];
                t = t || 2E3;
                for (var g = !0, b = d, c = 0; c < a.length; c++) {
                    var h = a[c];
                    if ("undefined" == typeof b[h]) {
                        g = !1;
                        break
                    }
                    b = b[h]
                }
                g ? e() : f && setTimeout(function() {
                    app.onReady(d, a, e, --f)
                }, t)
            }
        };

        app.onReady(window, "$", function () { $(function () {
    function LiteBox(images) {
        var _self = this;
        _self.images = images;
        _self.length = images.size();
        _self.popup = new Popup('<div class="lb-body"></div><div class="lb-footer"><div class="title"></div><div class="counter"></div></div>');
        var popupBody = _self.popup.el.find(".popup-inner");
        var beforeHandler = $('<span class="prev button"></span>'), afterHandler = $('<span class="next button"></span>');
        if(images.size() > 1) {
            popupBody.before(beforeHandler);
            popupBody.after(afterHandler);
        }
        beforeHandler.on("click", function () {
           _self.prev()
        });
        afterHandler.on("click", function () {
            _self.next()
        });
        this.images.each(function (i, img) {
            $(img).on("click", function (e) {
                e.preventDefault();
                _self.show(i)
            })
        });
        _self.index = 0;
    }

    var _l = LiteBox.prototype;
    _l.load = function () {
        var _self = this, a = _self.images.get(_self.index), el = _self.popup.el
        var image = '<img title="' + a.title + '" alt="' + a.title + '" src="' + a.href + '"/>'
        el.find(".lb-body").html(image)
        el.find(".lb-footer .title").text(a.title)
        el.find(".lb-footer .counter").text(_self.index + 1 + ' of ' + _self.length)
    };

    _l.show = function (index) {
        var _self = this;
        _self.index = index;
        _self.load();
        _self.popup.render()
    };

    _l.prev = function () {
        var _self = this;
        _self.index--;
        if(_self.index < 0) {
            _self.index = _self.length - 1
        }
        _self.load()
    };

    _l.next = function () {
        var _self = this;
        _self.index++;
        if(_self.index >= _self.length) {
            _self.index = 0
        }
        _self.load()
    };

    var priceWraps = $(".product-price-options .p-wrap");
    priceWraps.on("click", function () {
        var $this = $(this);
        priceWraps.removeClass("active")
        $this.addClass("active")
        $this.find("input").get(0).checked = true
    })
    $('#button-cart').on('click', function() {
        $.ajax({
            url: 'checkout/cart/add',
            method: 'post',
            data: $('#input-enable-emi:checked, #product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
            dataType: 'json',
            beforeSend: function() {
                $('#button-cart').button('loading');
            },
            complete: function() {
                $('#button-cart').button('reset');
            },
            success: function(json) {
                $('.alert, .text-danger').remove();
                $('.form-group').removeClass('has-error');
                var alertRow = $(".container.alert-container");
                if(alertRow.size() === 0) {
                    alertRow = $('<div class="container alert-container"></div>');
                    $('.after-header').after(alertRow)
                }

                if (json['error']) {
                    if (json['error']['option']) {
                        for (i in json['error']['option']) {
                            var element = $('#input-option' + i.replace('_', '-'));

                            if (element.parent().hasClass('input-group')) {
                                element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                            } else {
                                element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                            }
                        }
                    } else if(typeof json['error'] === "string") {
                        showMsg(`<div class="msg-wrap">${json['error']}</div>`, 'error')
                    }

                    // Highlight any found errors
                    $('.text-danger').parent().addClass('has-error');
                }

                if (json['success']) {
                    showMsg(json['success'])

                    setTimeout(function () {
                        $('.mc-toggler .text').html(json['total']);
                        $('.mc-toggler .counter').text(json['count']).attr("data-count", json['count'])
                        $(".mc-toggler").attr("title", json['total'])
                    }, 100);
                    app.event.trigger("addToCart", json)
                    cart.reload();
                    fbq('track', 'AddToCart', {
                        content_ids: [product_id],
                        content_type: 'product',
                        value: json['item_total'],
                        currency: 'BDT'
                    });
                }
            }
        });
    });
    
    $('#review, #question').delegate('.pagination a', 'click', function(e) {
        e.preventDefault();
        var panel = $(this).parents("#review, #question");
        panel.removeClass("f-in").addClass("f-out");
        panel.load(this.href);
        panel.removeClass('f-out').addClass("f-in")
    });

  /*  $('#review').load('product/product/review?product_id=' + product_id);*/

    /*$('#question').load('product/product/question?product_id=' + product_id);*/

    $('#button-review, #button-question').on('click', function(e) {
        var $this = $(this), form = $this.parents("form");
        $.ajax({
            url: form.attr("action"),
            method: 'post',
            dataType: 'json',
            contentType: null,
            data: new FormData(form.get(0)),
            beforeSend: function() {
                $this.button('loading');
            },
            complete: function() {
                $this.button('reset');
            },
            success: function(json) {
                $('.alert-success, .alert-danger').remove();
                if (json['error']) {
                    form.before('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
                }
                if (json['success']) {
                    form.before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
                    form.get(0).reset()
                }
            }
        });
    });


    $(".share-ico").on("click", function () {
        shareOnSocialMedea($(this).data("type"), location.href, $("h1[itemprop=name]").text(), $(".main-img").attr("src"))
    });


    $(".view-more").on("click", function (e) {
        e.preventDefault();
        var area =  $("#specification");
        if(area.length === 0) area = $("#description");
        $("html,body").scrollTo(area.offset().top - 140, 600)
    });

    $("[data-area]").on("click", function (e) {
        e.preventDefault();
        var $this = $(this);
        $("html,body").scrollTo($("#" + $this.data("area")).offset().top - 140, 600)
    });

    var qtyBox = $('.quantity [name=quantity]');
    $(".quantity .ctl").on("click", function () {
        var $this = $(this), qty = +qtyBox.val();
        if($this.is(".increment")) {
            qty++
        } else  {
            qty--
        }
        if(isNaN(qty) || qty < 1) {
            qtyBox.val(1)
        } else {
            qtyBox.val(qty)
        }
    });
    new LiteBox($('.product-images a'))

})}, 20);