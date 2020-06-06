
$(function () {

    //Afficher l'ancien pwd lors de l'event hover sur l'icone show-old-pwd

    var txtOldPwd=$('.oldpwd');

    $('.show-old-pwd').hover(
        function () {
            txtOldPwd.attr('type','text');
        },
        function () {
            txtOldPwd.attr('type','password');
        }

    )

    //Afficher le nouveau pwd lors de l'event hover sur l'icone show-new-pwd

    var txtNewPwd=$('.newpwd');

    $('.show-new-pwd').hover(
        function () {
            txtNewPwd.attr('type','text');
        },
        function () {
            txtNewPwd.attr('type','password');
        }

    )

});
