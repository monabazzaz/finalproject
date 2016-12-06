function loadOpenLibrary() {

console.log("show-elements(image)")
$.ajax({
    type: "GET",
    url: "http://content.guardianapis.com/search?from-date=2010-01-01&show-elements=all&q=new%20zealand%20earthquake&api-key=0cd788b2-dfe4-4dfc-aaa5-8fa81689f1d3",
    dataType: "json",
    crossDomain: true,
    success: loadGuardian
  });

}
 var guardiandata ="";



function loadGuardian(data) {
  console.log(data)

      var results = data.response.results;

       var guardianDate = data.response.results.webPublicationDate;


             $.each(results, function(index,results){

                 guardiandata += '<br><h4><a class="nyt-links" href="' + data.response.results[index].webUrl + '">' + data.response.results[index].webTitle + '</a></h4>';
                 guardiandata += '<h5>Published: ' + results.webPublicationDate + '</h5>';
                 guardiandata += '<hr>';

             });



           $("#guardian-results").append(guardiandata);
           $("#guardian-results2").append(guardiandata);

}
loadOpenLibrary();
