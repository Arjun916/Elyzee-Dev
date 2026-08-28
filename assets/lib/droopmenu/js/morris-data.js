
$(function () {
	"use strict";
	

	barChart();
	areaChart();
	lineChart();
	lineChart2();
	donutChart();
	areaChart2();

	var resizeTimeout;
	$(window).resize(function(){
		clearTimeout(resizeTimeout);
		resizeTimeout = setTimeout(function(){
			window.lineChart.redraw();
			window.lineChart2.redraw();
			window.areaChart.redraw();
			window.donutChart.redraw();
			window.areaChart2.redraw();
			window.barChart.redraw();
		},600);
	});
	
});

function lineChart() {	
	window.lineChart = Morris.Area({
		element: 'morris-area-chart',
		data: [{
			period: '2012',
			iphone: 50,
			ipad: 140,
			itouch: 20
		},
		{
			period: '2013',
			iphone: 130,
			ipad: 100,
			itouch: 80
		},
		{
			period: '2014',
			iphone: 80,
			ipad: 60,
			itouch: 70
		},
		{
			period: '2015',
			iphone: 70,
			ipad: 200,
			itouch: 140
		}, 
		{
			period: '2016',
			iphone: 180,
			ipad: 150,
			itouch: 140
		}, 
		{
			period: '2017',
			iphone: 125,
			ipad: 100,
			itouch: 80
		},
		{
			period: '2018',
			iphone: 250,
			ipad: 150,
			itouch: 200
		}],
		xkey: 'period',
		ykeys: ['iphone', 'ipad', 'itouch'],
		labels: ['iPhone', 'iPad', 'iPod Touch'],
		pointSize: 3,
		fillOpacity: 0,
		pointStrokeColors:['#6EE9EF', '#6772E5', '#b4becb'],
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		lineWidth: 3,
		hideHover: 'auto',
		lineColors: ['#6EE9EF', '#6772E5', '#b4becb']
	});
}

function areaChart() {
	window.areaChart = Morris.Area({
		element: 'morris-area-chart2',
		data: [{
			period: '2012',
			iMac: 0,
			iPhone: 0
		}, 
		{
			period: '2013',
			iMac: 130,
			iPhone: 100
		}, 
		{
			period: '2014',
			iMac: 30,
			iPhone: 60
		}, 
		{
			period: '2015',
			iMac: 110,
			iPhone: 200
		}, 
		{
			period: '2016',
			iMac: 200,
			iPhone: 150
		}, 
		{
			period: '2017',
			iMac: 105,
			iPhone: 90
		},
		{
			period: '2018',
			iMac: 250,
			iPhone: 150
		}],
		xkey: 'period',
		ykeys: ['iMac', 'iPhone'],
		labels: ['iMac', 'iPhone'],
		pointSize: 0,
		fillOpacity: 0.6,
		pointStrokeColors:['#b4becb', '#01c0c8'],
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		lineWidth: 0,
		smooth: false,
		hideHover: 'auto',
		lineColors: ['#b4becb', '#01c0c8']
	});
}

function lineChart2() {		
	window.lineChart2 = new Morris.Line({
		element: 'morris-line-chart',
		data: [
			{y: '2016 Q1', item1: 2666},
			{y: '2016 Q2', item1: 2778},
			{y: '2016 Q3', item1: 4912},
			{y: '2016 Q4', item1: 3767},
			{y: '2017 Q1', item1: 6810},
			{y: '2017 Q2', item1: 5670},
			{y: '2017 Q3', item1: 4820},
			{y: '2017 Q4', item1: 15073},
			{y: '2018 Q1', item1: 10687},
			{y: '2018 Q2', item1: 8432}
		],
		xkey: 'y',
		ykeys: ['item1'],
		labels: ['Item 1'],
		gridLineColor: '#eef0f2',
		lineColors: ['#6EE9EF'],
		lineWidth: 3,
		hideHover: 'auto'
	});
}

function donutChart() {				
	window.donutChart = Morris.Donut({
		element: 'morris-donut-chart',
		data: [{
			label: "Food",
			value: 120
		}, 
		{
			label: "Beverages",
			value: 130
		}, 
		{
			label: "Soft Drinks",
			value: 200
		}],
		colors:['#6772E5', '#6EE9EF', '#EBEBEB']
	});
}

function barChart() {		
	window.barChart = Morris.Bar({
		element: 'morris-bar-chart',
		data: [{
			y: '2012',
			ford: 100,
			toyota: 90,
			subaru: 60
		}, 
		{
			y: '2013',
			ford: 75,
			toyota: 65,
			subaru: 40
		}, 
		{
			y: '2014',
			ford: 50,
			toyota: 40,
			subaru: 30
		}, 
		{
			y: '2015',
			ford: 75,
			toyota: 65,
			subaru: 40
		}, 
		{
			y: '2016',
			ford: 50,
			toyota: 40,
			subaru: 30
		}, 
		{
			y: '2017',
			ford: 75,
			toyota: 65,
			subaru: 40
		}, 
		{
			y: '2018',
			ford: 100,
			toyota: 90,
			subaru: 40
		}],
		xkey: 'y',
		ykeys: ['ford', 'toyota', 'subaru'],
		labels: ['Ford', 'Toyota', 'Subaru'],
		barColors:['#6EE9EF', '#EBEBEB', '#6772E5'],
		hideHover: 'auto',
		gridLineColor: '#eef0f2'
	});
}

function areaChart2() {	
	window.areaChart2 = Morris.Area({
		element: 'extra-area-chart',
		data: [{
			period: '2012',
			phones: 0,
			laptops: 0,
			desktops: 0
		}, 
		{
			period: '2013',
			phones: 150,
			laptops: 115,
			desktops: 50
		}, 
		{
			period: '2014',
			phones: 40,
			laptops: 70,
			desktops: 120
		}, 
		{
			period: '2015',
			phones: 160,
			laptops: 120,
			desktops: 20
		}, 
		{
			period: '2016',
			phones: 30,
			laptops: 20,
			desktops: 120
		}, 
		{
			period: '2017',
			phones: 125,
			laptops: 80,
			desktops: 40
		}, 
		{
			period: '2018',
			phones: 0,
			laptops: 0,
			desktops: 0
		}],
		lineColors: ['#b4becb', '#01c0c8', '#5837DD'],
		xkey: 'period',
		ykeys: ['phones', 'laptops', 'desktops'],
		labels: ['Phones', 'Laptops', 'Desktops'],
		pointSize: 0,
		lineWidth: 0,
		fillOpacity: 0.5,
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		hideHover: 'auto'
	});
}