document.addEventListener('DOMContentLoaded', function() 
{
    const fechaInicial = document.getElementById('fechaInicial');
    const fechaFinal = document.getElementById('fechaFinal');
    const boton = document.getElementById('boton');

    boton.onclick = function () {
        let mes = fechaInicial.value.substr(0,2)
        let ano = fechaInicial.value.substr(3,6)
        let mesf = fechaFinal.value.substr(0,2)
        let anof = fechaFinal.value.substr(3,6)

        if(fechaInicial.value.length == 7 && fechaFinal.value.length == 7 && fechaInicial.value.includes('-') && fechaFinal.value.includes('-'))
        {
            if(anof == ano && mes != "00" && mesf != "00") 
            {
                if(mesf < mes)
                {
                    alert('El mes final no puede ser menor que el mes inicial si el año es el mismo!')
                    fechaInicial.value= '';
                    fechaFinal.value= '';

                }
                else{
                    alert('Información Correcta! AÑO IGUAL');
                }
            }

            else if (anof > ano && mes != "00" && mesf != "00"){
                alert('Información Correcta AÑO MAYOR')
            }

            else
            {
                console.log(ano +'  ' + anof);
                alert('El año final no puede ser menor que el año inicial y los meses no pueden ser 00!');
                fechaInicial.value= '';
                fechaFinal.value= '';
            }
        }
        else{
            alert('Formato equivocado');
            fechaInicial.value= '';
            fechaFinal.value= '';
        }

      }

});