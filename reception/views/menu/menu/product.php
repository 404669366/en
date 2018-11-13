<?php $this->registerJsFile('/resource/js/page.js'); ?>
<div id="features" class="section wb">
    <div class="container" style="min-height: 83rem">
        <div class="row products"></div>
    </div>
</div>
<script>
    page({
        element: '.products',
        url: '/product/product/data',
        length:6,
        callBack: function (row) {
            $('.products').append('<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 3rem;min-height: 36rem">\n' +
                '                <div class="service-widget">\n' +
                '                    <div class="property-main">\n' +
                '                        <div class="property-wrap">\n' +
                '                            <figure class="post-media wow fadeIn">\n' +
                '                                <a href="/product/product/detail?id='+row.id+'" class="hoverbutton global-radius"><i\n' +
                '                                            class="flaticon-unlink"></i></a>\n' +
                '                                <img src="'+row.image+'" alt="" class="img-responsive" style="height: 24rem">\n' +
                '                                <div class="price">\n' +
                '                                    <span class="item-sub-price">￥'+row.price+'</span>\n' +
                '                                </div>\n' +
                '                            </figure>\n' +
                '                            <a href="/product/product/detail?id='+row.id+'">\n' +
                '                                <div class="item-body">\n' +
                '\n' +
                '                                    <h3>'+row.name+'</h3>\n' +
                '                                    <div class="info">\n' +
                '                                      '+row.summary+'\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </a>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>');
        }
    })
</script>
