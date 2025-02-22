<form method="POST" action="/add-tip">
    @csrf
    <label for="tab_name">Select Tab:</label>
    <select name="tab_name" required>
        <option value="Tip 01">Tip 01</option>
        <option value="Tip 02">Tip 02</option>
        <!-- Add more options -->
    </select>
    <textarea name="content" placeholder="Enter your tip here..." required></textarea>
    <button type="submit">Add Tip</button>
</form>
