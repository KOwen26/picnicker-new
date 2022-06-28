<div class="overflow-x-scroll">
    <table class="table-auto" id="cities-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Province</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1.</th>
                <td>Owen</td>
                <td>Owen</td>
                <td>
                    <div class="flex content-center justify-center">
                        <button type="button" class="p-2 mx-2 text-white rounded-md bg-sky-500 hover:bg-sky-600">
                            <i class='w-6 fas fa-info'></i>
                        </button>
                        <button type="button" class="p-2 mx-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                            <i class='w-6 fas fa-trash-can'></i>
                        </button>
                    </div>
                </td>
            </tr>

        </tbody>
        <tfoot></tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#cities-table').DataTable();
    });
</script>
