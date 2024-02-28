<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Eloquent</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <br />
        <div class="container">
            <h3 align="center">Laravel Eloquent: Deeper Relationships with One Query</h3>
            <br />
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="serach" id="serach" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer;">S.No. <span id="id_icon"></span></th>
                            <th width="38%" class="sorting" data-sorting_type="asc" data-column_name="post_title" style="cursor: pointer;">City <span id="post_title_icon"></span></th>
                            <th width="57%">Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('data.pagination_data')
                    </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                function clear_icon() {
                    $("#id_icon").html("");
                    $("#post_title_icon").html("");
                }

                function fetch_data(page, sort_type, sort_by, query) {
                    $.ajax({
                        url: "/pagination/fetch_data?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                        success: function (data) {
                            $("tbody").html("");
                            $("tbody").html(data);
                        },
                    });
                }

                $(document).on("keyup", "#serach", function () {
                    var query = $("#serach").val();
                    var column_name = $("#hidden_column_name").val();
                    var sort_type = $("#hidden_sort_type").val();
                    var page = $("#hidden_page").val();
                    fetch_data(page, sort_type, column_name, query);
                });

                $(document).on("click", ".sorting", function () {
                    var column_name = $(this).data("column_name");
                    var order_type = $(this).data("sorting_type");
                    var reverse_order = "";
                    if (order_type == "asc") {
                        $(this).data("sorting_type", "desc");
                        reverse_order = "desc";
                        clear_icon();
                        $("#" + column_name + "_icon").html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
                    }
                    if (order_type == "desc") {
                        $(this).data("sorting_type", "asc");
                        reverse_order = "asc";
                        clear_icon;
                        $("#" + column_name + "_icon").html('<span class="glyphicon glyphicon-triangle-top"></span>');
                    }
                    $("#hidden_column_name").val(column_name);
                    $("#hidden_sort_type").val(reverse_order);
                    var page = $("#hidden_page").val();
                    var query = $("#serach").val();
                    fetch_data(page, reverse_order, column_name, query);
                });

                $(document).on("click", ".pagination a", function (event) {
                    event.preventDefault();
                    var page = $(this).attr("href").split("page=")[1];
                    $("#hidden_page").val(page);
                    var column_name = $("#hidden_column_name").val();
                    var sort_type = $("#hidden_sort_type").val();

                    var query = $("#serach").val();

                    $("li").removeClass("active");
                    $(this).parent().addClass("active");
                    fetch_data(page, sort_type, column_name, query);
                });
            });
        </script>
    </body>
</html>
