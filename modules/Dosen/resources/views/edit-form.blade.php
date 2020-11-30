<div class="ui divider hidden"></div>
<div class="ui horizontal divider">
    Tambah Riwayat Pendidikan
</div>

<table class="ui celled table" id="user_table" aria-describedby="Tambah Dosen">
    <thead>
    <tr>
        <th id="strata">Strata</th>
        <th id="jurusan">Jurusan</th>
        <th id="sekolah">Sekolah</th>
        <th id="tahun_mulai">Tahun Mulai</th>
        <th id="tahun_selesai">Tahun Selesai</th>
        <th id=""></th>
    </tr>
    </thead>
    <tbody class="dynf">

    </tbody>
</table>

{{--------------------------------------------------------------------------------------------------------}}
<script>
    $(document).ready(function () {

        var count = 1;

        function dynamic_field(count) {

            html = '<tr>';
            html += '<td><input type="text" name="strata[]" placeholder="Strata"></td>';
            html += '<td><input type="text" name="jurusan[]" placeholder="Jurusan"></td>';
            html += '<td><input type="text" name="sekolah[]" placeholder="Sekolah"></td>';
            html += '<td><input type="date" name="tahun_mulai[]"></td>';
            html += '<td><input type="date" name="tahun_selesai[]"></td>';

            if (count > 1) {
                html += '<td class="center aligned" >' +
                    '<button type="button" name="remove" id="" class="ui red icon button remove">' +
                    '<i class="minus icon"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>';

                $('.dynf').append(html);
            } else {
                html += '<td class="center aligned">' +
                    '<button type="button" name="add" id="add" class="ui green icon button">' +
                    '<i class="plus icon"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>';

                $('.dynf').html(html);
            }
        }

        $(document).on('click', '#add', function () {
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function () {
            count--;
            $(this).closest("tr").remove();
        });

        dynamic_field(count);
    });
</script>
{{--------------------------------------------------------------------------------------------------------}}
