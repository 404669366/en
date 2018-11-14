<?php $this->registerJsFile('/resource/js/page.js'); ?>
<div id="features" class="section wb">
    <div class="container" style="min-height: 83rem">
        <div class="row news"></div>
    </div>
</div>
<script>
    page({
        element: '.news',
        url: '/news/news/data',
        length:6,
        callBack: function (row) {
            $('.news').append('<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 3rem;">\n' +
                '                <div class="service-widget">\n' +
                '                    <div class="property-main">\n' +
                '                        <div class="property-wrap">\n' +
                '                            <figure class="post-media wow fadeIn">\n' +
                '                                <a href="/news/news/detail?id='+row.id+'" class="hoverbutton global-radius"><i\n' +
                '                                            class="flaticon-unlink"></i></a>\n' +
                '                                <img src="'+row.image+'" alt="" class="img-responsive" style="height: 30rem">\n' +
                '                            </figure>\n' +
                '                            <a href="/news/news/detail?id='+row.id+'">\n' +
                '                                <div class="item-body">\n' +
                '\n' +
                '                                    <h3>'+row.title+'</h3>\n' +
                '                                    <div class="info" style="max-height: 10rem;overflow: hidden">\n' +row.summary+
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

