$(document).ready(function() {
    $.ajax({
        url: "data/dt.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var cat = [];
            var total = [];

            for (var i in data) {
                cat.push(data[i].cname);
                total.push(data[i].total);
            }
            var training = {
                labels: cat,
                datasets: [{
                    label: 'Computer Trainings',
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    hoverBackgroundColor: ['#f89687', '#66ffba', '#f5ae3d', '#66e0ff', '#8bbdda'],
                    hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                    data: total

                }]
            };
            var graphTarget = $("#trCanvas");
            var barGraph = new Chart(graphTarget, {
                type: 'pie',
                data: training,
                options: {
                    cutoutPercentage: 50
                },

            });
        },
        error: function(data) {
            console.log(data);
        }

    });

    $.ajax({
        url: "data/dm.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var woreda = [];
            var desktop = [];
            var printer = [];
            var laptop = [];
            var photocopier = [];
            var fax = [];
            var scanner = [];
            var sw = [];
            var pr = [];
            var sv = [];

            for (var i in data) {
                woreda.push(data[i].woredas.name);
                desktop.push(data[i].desktop);
                printer.push(data[i].printer);
                laptop.push(data[i].laptop);
                photocopier.push(data[i].photocopier);
                fax.push(data[i].fax);
                scanner.push(data[i].scanner);
                sw.push(data[i].sw);
                pr.push(data[i].pr);
                sv.push(data[i].sv);
            }
            var chartdata = {
                labels: woreda,
                datasets: [{
                        label: 'ደስክቶፕ',
                        backgroundColor: '#00a65a',
                        hoverBackgroundColor: '#f89687',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: desktop
                    },
                    {
                        label: 'ፕሪንተር',
                        backgroundColor: '#00a65a',
                        hoverBackgroundColor: '#66ffba',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: printer
                    },
                    {
                        label: 'ላፕቶፕ',
                        backgroundColor: '#f39c12',
                        hoverBackgroundColor: '#f5ae3d',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: laptop
                    },
                    {
                        label: 'ፎቶኮፒ',
                        backgroundColor: '#00c0ef',
                        hoverBackgroundColor: '#66e0ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: photocopier
                    },
                    {
                        label: 'ፋክስ',
                        backgroundColor: '#3c8dbc',
                        hoverBackgroundColor: '#8bbdda',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: fax
                    },
                    {
                        label: 'ስካነር',
                        backgroundColor: '#cc33ff',
                        hoverBackgroundColor: '#e699ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: scanner
                    },
                    {
                        label: 'ስዊች',
                        backgroundColor: '#0039e6',
                        hoverBackgroundColor: '#4d79ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: sw
                    },
                    {
                        label: 'ፕሮጀክተር',
                        backgroundColor: '#6600cc',
                        hoverBackgroundColor: '#9933ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: pr
                    },
                    {
                        label: 'ሰርቨር',
                        backgroundColor: '#99cc00',
                        hoverBackgroundColor: '#c6ff1a',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: sv
                    }
                ]
            };
            var graphTarget = $("#mtCanvas");
            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
                options: {
                    responsive: true
                },

            });
        },
        error: function(data) {
            console.log(data);
        }

    });

    $.ajax({
        url: "data/dap.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var woreda = [];
            var ccms = [];
            var ibex = [];
            var payroll = [];
            var pass = [];
            var trls = [];
            var mis = [];
            var sigtas = [];
            var imis = [];
            var isla = [];
            var omas = [];
            var pads = [];
            var others = [];

            for (var i in data) {
                woreda.push(data[i].woredas.name);
                ccms.push(data[i].ccms);
                ibex.push(data[i].ibex);
                payroll.push(data[i].payroll);
                pass.push(data[i].pass);
                trls.push(data[i].trls);
                mis.push(data[i].mis);
                sigtas.push(data[i].sigtas);
                imis.push(data[i].imis);
                isla.push(data[i].isla);
                omas.push(data[i].omas);
                pads.push(data[i].pads);
                others.push(data[i].others);
            }
            var chartdata = {
                labels: woreda,
                datasets: [{
                        label: 'CCMS',
                        backgroundColor: '#f56954',
                        hoverBackgroundColor: '#f89687',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: ccms
                    },
                    {
                        label: 'IBEX',
                        backgroundColor: '#00a65a',
                        hoverBackgroundColor: '#66ffba',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: ibex
                    },
                    {
                        label: 'Payroll',
                        backgroundColor: '#f39c12',
                        hoverBackgroundColor: '#f5ae3d',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: payroll
                    },
                    {
                        label: 'PASS',
                        backgroundColor: '#00c0ef',
                        hoverBackgroundColor: '#66e0ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: pass
                    },
                    {
                        label: 'TRLS',
                        backgroundColor: '#3c8dbc',
                        hoverBackgroundColor: '#8bbdda',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: trls
                    },
                    {
                        label: 'MIS',
                        backgroundColor: '#cc33ff',
                        hoverBackgroundColor: '#e699ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: mis
                    },
                    {
                        label: 'SIGTAS',
                        backgroundColor: '#0039e6',
                        hoverBackgroundColor: '#4d79ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: sigtas
                    },
                    {
                        label: 'ፕሮጀክተር',
                        backgroundColor: '#6600cc',
                        hoverBackgroundColor: '#9933ff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: imis
                    },
                    {
                        label: 'ISLA',
                        backgroundColor: '#99cc00',
                        hoverBackgroundColor: '#c6ff1a',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: isla
                    },
                    {
                        label: 'OMAS',
                        backgroundColor: '#1ac6ff',
                        hoverBackgroundColor: '#80dfff',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: omas
                    },
                    {
                        label: 'PADS',
                        backgroundColor: '#99004d',
                        hoverBackgroundColor: '#cc0066',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: pads
                    },
                    {
                        label: 'ሌሎች',
                        backgroundColor: '#004d00',
                        hoverBackgroundColor: '#00b300',
                        hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                        data: others
                    }
                ]
            };
            var graphTarget = $("#appCanvas");
            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },

            });
        },
        error: function(data) {
            console.log(data);
        }

    });

    $.ajax({
        url: "data/dweb.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var status = [];
            var webs = [];

            for (var i in data) {
                status.push(data[i].status_name);
                webs.push(data[i].webs);
            }
            var website = {
                labels: status,
                datasets: [{
                    label: 'Websites',
                    backgroundColor: ['#0066ff', '#ff3300', '#6600ff', '#0099ff'],
                    hoverBackgroundColor: ['#4d94ff', '#ff5c33', '#8533ff', '#33adff'],
                    hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                    data: webs

                }]
            };
            var webGraphTarget = $("#webCanvas");
            var pieGraph = new Chart(webGraphTarget, {
                type: 'doughnut',
                data: website,
                options: {
                    cutoutPercentage: 50
                },

            });
        },
        error: function(data) {
            console.log(data);
        }

    });

    $.ajax({
        url: "data/dcc.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var status = [];
            var cc = [];

            for (var i in data) {
                status.push(data[i].status);
                cc.push(data[i].cc);
            }
            var chartdata = {
                labels: status,
                datasets: [{
                    label: 'ሁለገብ ማሕበረሰብ ማዕከላት',
                    backgroundColor: ['#f56954', '#0099ff', '#3c8dbc', ],
                    hoverBackgroundColor: ['#f89687', '#33adff', '#66e0ff', ],
                    hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                    data: cc

                }]
            };
            var graphTarget = $("#ccCanvas");
            var barGraph = new Chart(graphTarget, {
                type: 'pie',
                data: chartdata,
                options: {
                    hoverOffset: 4
                },

            });
        },
        error: function(data) {
            console.log(data);
        }

    });

    $.ajax({
        url: "data/dmt.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var woreda = [];
            var total = [];

            for (var i in data) {
                woreda.push(data[i].woredas.name);
                total.push(data[i].total);
            }
            var chartdata = {
                labels: woreda,
                datasets: [{
                    label: 'አጠቃላይ ጥገና',
                    backgroundColor: [
                        '#f56954',
                        '#00a65a',
                        '#f39c12',
                        '#00c0ef',
                        '#3c8dbc',
                        '#32d6de',
                        '#00a65a',
                        '#00c0ef',
                        '#f39c12',
                        '#3c8dbc',
                        '#d2d6de'
                    ],
                    hoverBackgroundColor: [
                        '#f89687',
                        '#66ffba',
                        '#f5ae3d',
                        '#66e0ff',
                        '#8bbdda',
                        '#76b2ba',
                        '#f5ae3d',
                        '#66e0ff',
                        '#8bbdda',
                        '#66ffba',
                        '#f5ae3d',
                    ],
                    hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                    data: total

                }]
            };
            var graphTarget = $("#dmtCanvas");
            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata,
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },

            });
        },
        error: function(data) {
            console.log(data);
        }

    });

    $.ajax({
        url: "data/dos.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var woreda = [];
            var total = [];

            for (var i in data) {
                woreda.push(data[i].woredas.name);
                total.push(data[i].total);
            }
            var chartdata = {
                labels: woreda,
                datasets: [{
                    label: 'አጠቃላይ ነፃ መተግበሪያዎች',
                    backgroundColor: [
                        '#f56954',
                        '#00a65a',
                        '#f39c12',
                        '#00c0ef',
                        '#3c8dbc',
                        '#32d6de',
                        '#00a65a',
                        '#00c0ef',
                        '#f39c12',
                        '#3c8dbc',
                        '#d2d6de'
                    ],
                    hoverBackgroundColor: [
                        '#f89687',
                        '#66ffba',
                        '#f5ae3d',
                        '#66e0ff',
                        '#8bbdda',
                        '#76b2ba',
                        '#f5ae3d',
                        '#66e0ff',
                        '#8bbdda',
                        '#66ffba',
                        '#f5ae3d',
                    ],
                    hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
                    data: total

                }]
            };
            var graphTarget = $("#dosCanvas");
            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata,
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },

            });
        },
        error: function(data) {
            console.log(data);
        }

    });

});