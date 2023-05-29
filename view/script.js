const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage() {
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}
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

function getJSON(url,data){
    return JSON.parse($.ajax({
        type: 'POST',
        url : url,
        data: data,
        dataType:'json',
        global: false,
        async: false,
        success:function(msg){

        }
    }).responseText);
}

window.addEventListener('resize', slideImage);