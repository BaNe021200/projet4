function hide(){

    var answerCommentElt = document.getElementById("answerComment");
     var reportformSubmitElt = document.getElementById("reportformSubmit");
        do {
            reportformSubmitElt.style.display = "none";
        }
    while(!answerCommentElt);


}
hide();