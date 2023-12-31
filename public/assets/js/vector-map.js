$(function() {
	'use strict';
	$('#vmap').vectorMap({
		map: 'world_en',
		backgroundColor: '#E9ECEF',
		color: '#ffffff',
		hoverOpacity: 0.7,
		selectedColor: '#666666',
		enableZoom: true,
		showTooltip: true,
		scaleColors: ['#353d9f', '#007bff'],
		values: sample_data,
		normalizeFunction: 'polynomial'
	});
	$('#vmap2').vectorMap({
		map: 'usa_en',
		showTooltip: true,
		backgroundColor: '#353d9f',
		hoverColor: '#00cccc'
	});
	$('#vmap3').vectorMap({
		map: 'canada_en',
		color: '#212229',
		borderColor: '#fff',
		backgroundColor: '#E9ECEF',
		hoverColor: '#007bff',
		showLabels: true
	});
	$('#vmap7').vectorMap({
		map: 'germany_en',
		color: '#353d9f',
		borderColor: '#fff',
		backgroundColor: '#efeff5',
		hoverColor: '#353d9f',
		showLabels: true
	});
	
	$('#vmap8').vectorMap({
		map: 'russia_en',
		color: '#3db4ec',
		borderColor: '#fff',
		backgroundColor: '#efeff5',
		hoverColor: '#3db4ec',
		showLabels: true
	});
	
	$('#vmap9').vectorMap({
		map: 'france_fr',
		color: '#f10075',
		borderColor: '#fff',
		backgroundColor: '#efeff5',
		hoverColor: '#f10075',
		showLabels: true
	});
});