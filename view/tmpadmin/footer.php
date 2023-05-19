</div>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#Table_ID').DataTable({
            // "scrollY": 200,
            "scrollX": true,
            "order": [
                [4, 'DESC']
            ],


        });
    });
</script>

</body>

</html>