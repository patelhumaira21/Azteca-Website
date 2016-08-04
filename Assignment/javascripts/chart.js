$(function(){

  $.ajax({
    url: "./api/get_artworks?TOP=10",
    success: function(response){
      response = JSON.parse(response);
      console.log(response);
      if(response && response.length>0){
          var points = [];
          for ( var i in response){
              var artwork = response[i];
              console.log(artwork)
              points.push({
                y:parseInt(artwork.number_sold),
                label:artwork.title
              });
          }

          var chart = new CanvasJS.Chart("chartContainer",
            {
              title:{
                text: "Best selling artworks"    
              },
              animationEnabled: true,
              axisY: {
                title: "Quantity Sold"
              },
              legend: {
                verticalAlign: "bottom",
                horizontalAlign: "center"
              },
              theme: "theme2",
              data: [
              {        
                type: "column",  
                showInLegend: true, 
                legendMarkerColor: "grey",
                legendText: "Artworks",
                dataPoints:points
              }   
              ]
            });

          chart.render();
      }
    }
  });
});