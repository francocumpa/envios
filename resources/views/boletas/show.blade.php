<x-seguimiento>

    <div class="card w-full">
        <div class="grid grid-cols-5 gap-6 h-full w-full px-20 py-32 lg:px-8">
            <div class="col-span-1 flex flex-col items-center justify-start h-full flex-shrink-0 py-6 px-12 @if($boleta->envios->first()->estado == 1) bg-red-500 @endif">
                

                <img src="{{ asset('storage/imagenes/pedido-confirmado.png') }}" alt="">
                <h1 class="max-w-full text-2xl font-bold mt-2 mb-2 text-center">Pedido Confirmado</h1>
                <p>El pedido ha sido confirmado y se encuentra en espera de ser procesado</p>
            </div>
            <div class="col-span-1 flex flex-col items-center justify-start h-full flex-shrink-0 py-6 px-12 @if($boleta->envios->first()->estado == 2) bg-red-500 @endif">
                
                <img src="{{ asset('storage/imagenes/en-proceso.png') }}" alt="">
                <h1 class="max-w-full text-2xl font-bold mt-2 mb-2 text-center">En Proceso</h1>
                <p>El pedido está siendo preparado para su envío. En esta etapa, 
                    los productos están siendo recogidos, empaquetados y etiquetados.</p>
                
            </div>
            <div class="col-span-1 flex flex-col items-center justify-start h-full flex-shrink-0 py-6 px-12 @if($boleta->envios->first()->estado == 3) bg-red-500 @endif">
                
                <img src="{{ asset('storage/imagenes/en-ruta.png') }}" alt="">
                <h1 class="max-w-full text-2xl font-bold mt-2 mb-2 text-center">En Ruta</h1>
                <p>El paquete está en camino hacia su destino. Puede haber múltiples actualizaciones de "en tránsito" a 
                    medida que el paquete pasa por diferentes instalaciones de clasificación y transporte.</p>
            </div>
            <div class="col-span-1 flex flex-col items-center justify-start h-full flex-shrink-0 py-6 px-12 @if($boleta->envios->first()->estado == 4) bg-red-500 @endif">
                
                <img src="{{ asset('storage/imagenes/en-entrega.png') }}" alt="">
                <h1 class="max-w-full text-2xl font-bold mt-2 mb-2 text-center">En Proceso de Entrega</h1>
                <p>El paquete está cerca de su destino , atento porfavor .</p>
            </div>
            <div class="col-span-1 flex flex-col items-center justify-start h-full flex-shrink-0 py-6 px-12 @if($boleta->envios->first()->estado == 5) bg-red-500 @endif">
                
                <img src="{{ asset('storage/imagenes/entregado.png') }}" alt="">
                <h1 class="max-w-full text-2xl font-bold mt-2 mb-2 text-center">Entregado</h1>
                <p>El paquete ha sido entregado con éxito en la dirección especificada.
                     En algunos casos, puede haber una confirmación de entrega, como una firma del destinatario.</p>
            </div>
        </div>
    </div>
    
    

</x-seguimiento>
