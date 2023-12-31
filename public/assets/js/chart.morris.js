$(function() {
	'use strict';
	var morrisData = [{
		y: '2006',
		a: 90,
		b: 65
	}, {
		y: '2007',
		a: 65,
		b: 65
	}, {
		y: '2008',
		a: 75,
		b: 55
	}, {
		y: '2009',
		a: 85,
		b: 55
	}, {
		y: '2010',
		a: 30,
		b: 50
	}, {
		y: '2011',
		a: 70,
		b: 50
	}, {
		y: '2012',
		a: 55,
		b: 45
	}, {
		y: '2013',
		a: 40,
		b: 60
	}];
	var morrisData2 = [{
		y: '2006',
		a: 90,
		b: 85,
		c: 60
	}, {
		y: '2007',
		a: 70,
		b: 60,
		c: 60
	}, {
		y: '2008',
		a: 45,
		b: 45,
		c: 45
	}, {
		y: '2009',
		a: 70,
		b: 60,
		c: 82
	}, {
		y: '2010',
		a: 80,
		b: 60,
		c: 70
	}, {
		y: '2011',
		a: 65,
		b: 55,
		c: 65
	}, {
		y: '2012',
		a: 60,
		b: 30,
		c: 35
	}, {
		y: '2013',
		a: 65,
		b: 55,
		c: 65
	}];
	new Morris.Bar({
		element: 'morrisBar1',
		data: morrisData,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		barColors: ['#5066e0', '#ff8c00'],
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Bar({
		element: 'morrisBar2',
		data: morrisData2,
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		barColors: ['#5066e0', '#ff8c00', '#02d7ff'],
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Bar({
		element: 'morrisBar3',
		data: morrisData,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		barColors: ['#5066e0', '#ff8c00'],
		stacked: true,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Bar({
		element: 'morrisBar4',
		data: morrisData2,
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		barColors: ['#5066e0', '#ff8c00', '#02d7ff'],
		stacked: true,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Line({
		element: 'morrisLine1',
		data: [{
			y: '2006',
			a: 60,
			b: 55
		}, {
			y: '2007',
			a: 60,
			b: 45
		}, {
			y: '2008',
			a: 40,
			b: 30
		}, {
			y: '2009',
			a: 30,
			b: 55
		}, {
			y: '2010',
			a: 40,
			b: 35
		}, {
			y: '2011',
			a: 65,
			b: 80
		}, {
			y: '2012',
			a: 50,
			b: 20
		}],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		lineColors: ['#5066e0', '#ff8c00'],
		lineWidth: 1,
		ymax: 'auto 100',
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Line({
		element: 'morrisLine2',
		data: [{
			y: '2006',
			a: 20,
			b: 10,
			c: 40
		}, {
			y: '2007',
			a: 30,
			b: 15,
			c: 45
		}, {
			y: '2008',
			a: 50,
			b: 40,
			c: 65
		}, {
			y: '2009',
			a: 40,
			b: 25,
			c: 55
		}, {
			y: '2010',
			a: 30,
			b: 15,
			c: 45
		}, {
			y: '2011',
			a: 45,
			b: 20,
			c: 65
		}, {
			y: '2012',
			a: 60,
			b: 40,
			c: 70
		}],
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		lineColors: ['#5066e0', '#ff8c00', '#02d7ff'],
		lineWidth: 1,
		ymax: 'auto 100',
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Area({
		element: 'morrisArea1',
		data: [{
			y: '2006',
			a: 50,
			b: 40
		}, {
			y: '2007',
			a: 25,
			b: 15
		}, {
			y: '2008',
			a: 40,
			b: 50
		}, {
			y: '2009',
			a: 70,
			b: 60
		}, {
			y: '2010',
			a: 60,
			b: 70
		}, {
			y: '2011',
			a: 55,
			b: 65
		}, {
			y: '2012',
			a: 90,
			b: 90
		}],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		lineColors: ['#5066e0', '#ff8c00'],
		lineWidth: 1,
		fillOpacity: 0.2,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Area({
		element: 'morrisArea2',
		data: [{
			y: '2006',
			a: 30,
			b: 20,
			c: 60
		}, {
			y: '2007',
			a: 20,
			b: 45,
			c: 35
		}, {
			y: '2008',
			a: 50,
			b: 50,
			c: 55
		}, {
			y: '2009',
			a: 50,
			b: 35,
			c: 45
		}, {
			y: '2010',
			a: 30,
			b: 25,
			c: 55
		}, {
			y: '2011',
			a: 25,
			b: 30,
			c: 55
		}, {
			y: '2012',
			a: 40,
			b: 50,
			c: 60
		}],
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		lineColors: ['#5066e0', '#ff8c00', '#02d7ff'],
		lineWidth: 1,
		fillOpacity: 0.2,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Donut({
		element: 'morrisDonut1',
		data: [{
			label: 'Men',
			value: 40
		}, {
			label: 'Women',
			value: 30
		}, {
			label: 'Kids',
			value: 20
		}],
		colors: ['#5066e0', '#ff8c00', '#02d7ff'],
		resize: true,
		labelColor:"#031b4e"
	});
	
	new Morris.Donut({
		element: 'morrisDonut2',
		data: [{
			label: 'Men',
			value: 60
		}, {
			label: 'Women',
			value: 20
		}, {
			label: 'Kids',
			value: 25
		}, {
			label: 'Infant',
			value: 15
		}],
		colors: ['#5066e0', '#ff8c00', '#00d48f ', '#02d7ff'],
		resize: true,
		labelColor:"#031b4e"
		
	});
});