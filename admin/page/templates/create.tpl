<a href="?page=page">List</a>
<div class="page_edit">
    <form method="post" action="?page=page&action=save">
        <label>Title: <input name="title" type="text" /></label>
        <label>Link: <input name="link" type="text" /></label>
        <label>Description: <textarea name="description"></textarea></label>
        <label>Active: <input type="checkbox" name="active" value="1" /></label>
        <input name="grant" type="hidden" value="1" />
        <input type="submit" name="create" value="Create">
    </form>
</div>