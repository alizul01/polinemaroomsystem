<form id="lantaiForm" method="GET">
    <select id="lantaiDropdown" name="floor">
        <option value="">Semua Lantai</option>
        <option value="5">Lantai 5</option>
        <option value="6">Lantai 6</option>
        <option value="7">Lantai 7</option>
        <option value="8">Lantai 8</option>
    </select>
</form>

<script>
    lantaiDropdown.addEventListener('change', (event) => {
        lantaiForm.submit();
    });
</script>
