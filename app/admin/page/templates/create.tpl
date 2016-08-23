<a href="page.html" class="btn btn-primary">List</a>
<div class="page_edit form-group row">
    <form method="post" action="page.html?action=save" class="form col-md-6">
        <label>Title: <input name="title" type="text" class="form-control" /></label>
        <label>Link: <input name="link" type="text" class="form-control" /></label>
        <label>Description: <textarea name="description" class="form-control"></textarea></label>
        <label><input type="checkbox" name="active" value="1" /> Active</label>
        <input name="grant" type="hidden" value="1" />
        <input type="submit" name="create" value="Create" class="btn btn-primary">
    </form>
</div>