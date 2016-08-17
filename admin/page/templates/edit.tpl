<a href="?page=page&action=create">Add</a>
<a href="?page=page">List</a>
<div class="page_edit">
    <form method="post" action="?page=page&action=save">
        <label><input name="id" type="hidden" value="[form_id]" /></label>
        <label>Title: <input name="title" type="text" value="[form_title]" /></label>
        <label>Link: <input name="link" type="text" value="[form_link]" /></label>
        <label>Description: <textarea name="description">[form_description]</textarea></label>
        <label>Active: <input type="checkbox" name="active" checked="[form_active]" value="1" /></label>
        <input name="grant" type="hidden" value="[form_grant]" />
        <input type="submit" name="save" value="Save">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>