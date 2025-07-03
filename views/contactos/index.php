<main class="space-y-8">
    <section class="border-neutral-400 border rounded-md p-4 space-y-5" >
        <div class="space-y-2">
            <h2 class="text-2xl font-bold">Añadir Contacto</h2>
            <span class=" text-neutral-500" >Ingresa el nombre y número del nuevo contacto</span>
        </div>
        <form action="" class="grid grid-cols-2 gap-4">
            <label class="space-y-2" for="nombre_contacto">
                <span class="font-semibold">Nombre</span>
                <input
                    type="text"
                    placeholder="Ingresa el nombre"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="nombre_contacto"
                    id="nombre_contacto"
                >
            </label>
            <label class="space-y-2" for="numero_contacto">
                <span class="font-semibold">Número</span>
                <input
                    type="tel"
                    placeholder="Ingresa el número"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="numero_contacto"
                    id="numero_contacto"
                >
            </label>
            <button
                class="col-span-2 bg-black rounded-md text-white
                px-4 py-2 font-bold hover:opacity-75 transition-opacity"
                type="submit"
            >
                Agregar
            </button>
        </form>
    </section>
    <section class="border-neutral-400 border rounded-md p-4 space-y-5">
        <div class="space-y-2">
            <h2 class="text-2xl font-bold">Lista de Contactos</h2>
            <span class=" text-neutral-500" >Estos son todos tus contactos</span>
        </div>
        <div class="flex flex-col gap-4">
            <!-- card -->
            <div class="border-neutral-400 border rounded-md p-3 flex justify-between items-center">
                <div>
                    <span class="text-lg font-semibold block">Luis Eduardo Ocegueda</span>
                    <span class="text-neutral-700" >3311863182</span>
                </div>
                <div class="flex justify-center gap-2">
                    <a
                        href="#"
                        class="bg-red-400 text-xl w-12 aspect-square flex justify-center
                        items-center rounded-md hover:opacity-75 transition-opacity"
                    >
                        <i class="fa-solid fa-trash"></i>
                    </a>
                    <a
                        href="#"
                        class="bg-yellow-400 text-xl w-12 aspect-square flex justify-center
                        items-center rounded-md hover:opacity-75 transition-opacity"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </div>
            </div
        </div>
    </section>
</main>
