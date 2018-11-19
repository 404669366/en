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
        length: 6,
        callBack: function (row) {
            $('.products').append('<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 3rem;">\n' +
                '                <a href="/product/product/detail?id=' + row.id + '">' +
                '                <div class="service-widget">\n' +
                '                    <div class="property-main">\n' +
                '                        <div class="property-wrap">\n' +
                '                            <figure class="post-media wow fadeIn">\n' +
                '                                <img src="' + row.image + '" alt="" class="img-responsive" style="height: 24rem">\n' +
                '                                <div class="price">\n' +
                '                                    <span class="item-sub-price">￥来电咨询</span>\n' +

                '                                </div>\n' +
                '                            </figure>\n' +
                '                            <a href="/product/product/detail?id=' + row.id + '">\n' +
                '                                <div class="item-body" style="min-height: 6rem;overflow: hidden">\n' +
                '                                    <h3>' + row.name + '</h3>\n' +
                '                                    <div class="info">\n' +
                '                                      ' + row.summary + '\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </a>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '                </a>\n' +
                '            </div>');
        }
    })
</script>
