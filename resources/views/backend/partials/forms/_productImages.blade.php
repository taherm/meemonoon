<div class="alert alert-success margin-bottom-10">
    <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true"></button>
    <i class="fa fa-warning fa-lg"></i> Image type and information need to be
    specified.
</div>
<div id="tab_images_uploader_container"
     class="text-align-reverse margin-bottom-10">
    <a id="tab_images_uploader_pickfiles" href="javascript:;"
       class="btn btn-success">
        <i class="fa fa-plus"></i> Select Files </a>
    <a id="tab_images_uploader_uploadfiles" href="javascript:;"
       class="btn btn-primary">
        <i class="fa fa-share"></i> Upload Files </a>
</div>
<div class="row">
    <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"></div>
</div>
<table class="table table-bordered table-hover">
    <thead>
    <tr role="row" class="heading">
        <th width="8%"> Image</th>
        <th width="25%"> Label</th>
        <th width="8%"> Sort Order</th>
        <th width="10%"> Base Image</th>
        <th width="10%"> Small Image</th>
        <th width="10%"> Thumbnail</th>
        <th width="10%"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
        </td>
        <td>
            <input type="text" class="form-control"
                   name="product[images][1][label]" value=""></td>
        <td>
            <input type="text" class="form-control"
                   name="product[images][1][sort_order]" value=""></td>
        <td>
            <label>
                <input type="radio" name="product[images][1][image_type]"
                       value=""> </label>
        </td>
        <td>
            <label>
                <input type="radio" name="product[images][1][image_type]"
                       value=""> </label>
        </td>
        <td>
            <label>
                <input type="radio" name="product[images][1][image_type]"
                       value=""> </label>
        </td>
        <td>
            <a href="javascript:;" class="btn btn-default btn-sm">
                <i class="fa fa-times"></i> Remove </a>
        </td>
    </tr>
    </tbody>
</table>