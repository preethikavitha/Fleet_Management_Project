<?php include("sidenav.php");
include("../dbcon.php");
$sql1="SELECT COUNT(*) AS vehicle FROM vehicle";
$result=$conn->query($sql1);
$row=$result->fetch_assoc();
$sql2="SELECT COUNT(*) AS Available FROM vehicle WHERE isActive='Active' AND status='Not Booked'";
$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();
$sql3="SELECT COUNT(*) AS Booked FROM vehicle WHERE isActive='Active' AND status='Booked'";
$result3=$conn->query($sql3);
$row3=$result3->fetch_assoc();
$sql4="SELECT COUNT(*) AS Service FROM vehicle WHERE isActive='Suspend'";
$result4=$conn->query($sql4);
$row4=$result4->fetch_assoc();
$sql5="SELECT COUNT(*) AS book FROM booking WHERE status='confirm' AND book_date>=now()-INTERVAL 1 MONTH";
$result5=$conn->query($sql5);
$row5=$result5->fetch_assoc();
$sql12="SELECT COUNT(*) AS book1 FROM booking WHERE status='confirm' AND book_date<=now()-INTERVAL 1 MONTH AND book_date>=now()-INTERVAL 2 MONTH";
$result12=$conn->query($sql12);
$row12=$result12->fetch_assoc();
$sql6="SELECT COUNT(*) as pick FROM booking WHERE pick_date=now() AND status='confirm'";
$result6=$conn->query($sql6);
$row6=$result6->fetch_assoc();
$sql13="SELECT COUNT(*) as pick1 FROM booking WHERE pick_date=now()-INTERVAL 1 DAY AND status='confirm'";
$result13=$conn->query($sql13);
$row13=$result13->fetch_assoc();
$sql7="SELECT COUNT(*) as dropdate FROM booking WHERE drop_date=now() AND status='confirm'";
$result7=$conn->query($sql7);
$row7=$result7->fetch_assoc();
$sql14="SELECT COUNT(*) as dropdate1 FROM booking WHERE drop_date=now()-INTERVAL 1 DAY AND status='confirm'";
$result14=$conn->query($sql14);
$row14=$result14->fetch_assoc();
$sql8="SELECT ROUND(SUM(tot_amt),2) AS amt FROM booking WHERE status='confirm' AND book_date>=now()-INTERVAL 1 MONTH";
$result8=$conn->query($sql8);
$row8=$result8->fetch_assoc();


$sql9="SELECT ROUND(SUM(amount_paid),2) AS ins FROM insurance_history WHERE date_of_payment>=now()-INTERVAL 1 MONTH";
$result9=$conn->query($sql9);
$row9=$result9->fetch_assoc();
$sql10="SELECT ROUND(SUM(rem_cost),2) AS ser FROM services WHERE datetime>=now()-INTERVAL 1 MONTH";
$result10=$conn->query($sql10);
$row10=$result10->fetch_assoc();
$sql11="SELECT ROUND(SUM(cost),2) AS fcost FROM fuel_cost WHERE datetime>=now()-INTERVAL 1 MONTH";
$result11=$conn->query($sql11);
$row11=$result11->fetch_assoc();

?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
             <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">directions_car</i>
              </div>
         

              
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Vehicles</p>
                <h4 class="mb-0"><?php if(isset($row['vehicle'])) echo number_format($row['vehicle']); else echo ''; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
             <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">check_box</i>
              </div>
         

              
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Available Vehicles</p>
                <h4 class="mb-0"><?php if(isset($row2['Available'])) echo number_format($row2['Available']); else echo ''; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
             <div class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">event_busy</i>
              </div>
         

              
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Booked Vehicles</p>
                <h4 class="mb-0"><?php if(isset($row3['Booked'])) echo number_format($row3['Booked']); else echo ''; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
             <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">build</i>
              </div>
         

              
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Vehicles in Service</p>
                <h4 class="mb-0"><?php if(isset($row4['Service'])) echo number_format($row4['Service']); else echo ''; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
</div>
&nbsp;
<div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">event</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users Booked</p>
                <h4 class="mb-0"><?php if(isset($row5['book'])) echo number_format($row5['book']); else echo ''; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"><?php $las=($row12['book1']-$row5['book'])/100; echo $las; ?>% </span>than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">event_busy</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Expected Pickup Today</p>
                <h4 class="mb-0"><?php if(isset($row6['pick'])) echo number_format($row6['pick']); else echo ''; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"><?php $las=($row13['pick1']-$row6['pick'])/100; echo $las; ?>%</span> than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">event_available</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Expected DropOff Today</p>
                <h4 class="mb-0"><?php if(isset($row7['dropdate'])) echo number_format($row7['dropdate']); else echo ''; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php $las=($row14['dropdate1']-$row7['dropdate'])/100; echo $las; ?>% </span>than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">payment</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Cost Gain By Rent</p>
                <h4 class="mb-0">₹<?php if(isset($row8['amt'])) echo number_format($row8['amt'],2); else echo number_format(0,2); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than last month</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
             <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">add_to_photos</i>
              </div>
         

              
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Cost Spend By Fuel</p>
                <h4 class="mb-0">₹<?php if(isset($row11['fcost'])) echo number_format($row11['fcost'],2); else echo number_format(0,2); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last month</p>
            </div>
          </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">add_to_photos</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Cost Spend By Insurance</p>
                <h4 class="mb-0">₹<?php if(isset($row9['ins'])) echo number_format($row9['ins'],2); else echo number_format(0,2); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">% </span>than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">add_to_photos</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Cost Spend By Services</p>
                <h4 class="mb-0">₹<?php if(isset($row10['ser'])) echo number_format($row10['ser'],2); else echo number_format(0,2); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">all_inclusive</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">TotalCost Spend</p>
                <h4 class="mb-0">₹<?php echo number_format($row10['ser']+$row9['ins']+$row11['fcost'],2) ;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
      </div>
     
          </div>
        </div>
      </div>
     
      
  <?php include("footernav.php")?>
         
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>-->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>