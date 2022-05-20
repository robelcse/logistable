//var baseurls = $("#baseurls").attr('href');
var baseurls = "http://localhost:8888/logistable";

//console.log(baseurls);
//console.log('asas');
var App ={
    baseurl:baseurls
};
new BloodhoundTypeahead({
    selector: '#name',
    endpoint: App.baseurl+'/api/users/%QUERY',
    value: 'name',
    selectMode: true,
    onSelect: function($el, obj){
        $("#name").val(obj.email);
        $("#user_id").val(obj.user_id);
    },
    emptySelector: "#user_id"
});