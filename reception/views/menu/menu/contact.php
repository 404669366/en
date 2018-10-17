<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Contact</h2>
                <!-- Breadcrumbs -->

            </div>
        </div>
    </div>
</div>

<div id="support" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>联系方式</h3>
            <p class="lead">
                Contact information
            </p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform" class="row" action="contact.php" name="contactform" method="post">
                        <fieldset class="row-fluid">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                <input type="text" name="name" id="first_name" class="form-control" placeholder="姓名"
                                       onchange="data()">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                <input type="tel" name="text" id="tel" class="form-control" placeholder="电话"
                                       onchange="data()">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                <select name="business" id="type" class="selectpicker form-control"
                                        data-style="btn-white">
                                    <option value="0">业务类型</option>
                                    <option value="1" onchange="data()">Weekdays</option>
                                    <option value="2" onchange="data()">Weekend</option>
                                    <option value="3" onchange="data()">Weekend</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                                <button type="submit" value="SEND" id="submit"
                                        class="btn btn-light btn-radius btn-brd grd1 btn-block">提交
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->