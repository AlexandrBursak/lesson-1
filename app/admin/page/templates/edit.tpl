<a href="page.html?action=create" class="btn btn-primary">Add</a>
<a href="page.html" class="btn btn-primary">List</a>
<div class="page_edit form-group row">
    <form method="post" action="page.html?action=save" class="form col-md-6">
        <label><input name="id" type="hidden" value="[form_id]" /></label>
        <label>Title: <input name="title" type="text" value="[form_title]" class="form-control" /></label>
        <label>Link: <input name="link" type="text" value="[form_link]" class="form-control" /></label>
        <label>Description: <textarea name="description" class="form-control">[form_description]</textarea></label>
        <div class="checkbox">
            <label><input type="checkbox" name="active" checked="[form_active]" value="1" /> Active</label>
        </div>
        <input name="grant" type="hidden" value="[form_grant]" />
        <input type="submit" name="save" value="Save" class="btn btn-primary">
    </form>
    <form method="post" action="page.html?action=delete" class="form col-md-6">
        <label><input name="id" type="hidden" value="[form_id]" /></label>
        <input type="submit" name="delete" value="Delete" class="btn btn-danger pull-right" />
    </form>
</div>