function formatRupiah(angka) {
    var rupiah = "";
    var angkarev = angka.toString().split("").reverse().join("");
    for(var i = 0; i < angkarev.length; i++) {
        if(i % 3 === 0) {
            rupiah += angkarev.substr(i, 3) + ".";
        }
    }
    return (
        "Rp. " +
        rupiah
            .split("", rupiah.length - 1)
            .reverse()
            .join("")
    );
}

function formatRupiahFungsi(angka, id, target) {

    document.getElementById(id).value = formatRupiahListener(angka);
    document.getElementById(target).value = angka.replace(/\./g, '');
}

function formatRupiahListener(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}