define(["jquery","moment","../Settings","TYPO3/CMS/Formlog/knockout-daterangepicker/daterangepicker"],function(a,b,c){a(function(){var d=a("#filter-form"),e=a("#submissiondate-filter"),f=a(e.data("startDateField")),g=a(e.data("endDateField")),h=e.data("translations"),i={last30days:[b().subtract(29,"days"),b()],lastYear:[b().subtract(1,"year").add(1,"day"),b()],other:"custom"},j={};for(var k in i){var l=k;k in h.ranges&&(l=h.ranges[k]),j[l]=i[k]}b.locale(c.language);var m=a.fn.daterangepicker.Period.title;a.fn.daterangepicker.Period.title=function(a){return a in h.periods?h.periods[a]:m(a)},e.daterangepicker({timeZone:c.timeZone,locale:h.labels,firstDayOfWeek:b.localeData().firstDayOfWeek(),startDate:f.val(),endDate:g.val(),ranges:j,callback:function(a,b,c){f.val(a.format("YYYY-MM-DDTHH:mm:ssZ")),g.val(b.format("YYYY-MM-DDTHH:mm:ssZ")),d.submit()}})})});