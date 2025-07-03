<main>
    <section class="border-neutral-400 border rounded-md p-4 space-y-5" >
        <div class="flex justify-between">
            <div>
                <h2 class="text-2xl font-bold">Editar Contacto</h2>
                <span class=" text-neutral-500" >Ingresa el nuevo nombre y número del contacto contacto </span>
            </div>
            <a
                class="block underline underline-offset-2 text-neutral-500"
                href="index.php"
            >
                <i class="fa-solid fa-backward"></i>
                Regresar
            </a>
        </div>
        <form
            action="index.php?action=editar&id=<?= $contacto["id"] ?>"
            method="post"
            class="grid gap-4 grid-cols-1 xl:grid-cols-2"
        >
            <label class="space-y-2" for="nombre_contacto">
                <span class="font-semibold">Nombre</span>
                <input
                    type="text"
                    placeholder="Ingresa el nombre"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="nombre_contacto"
                    id="nombre_contacto"
                    value="<?= $contacto["nombre"] ?>"
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
                    value="<?= $contacto["numero"] ?>"
                >
            </label>
            <button
                class="bg-black rounded-md text-white
                px-4 py-2 font-bold hover:opacity-75 transition-opacity
                col-span-1 xl:col-span-2"
                type="submit"
            >
                Editar
            </button>
        </form>
    </section>
</main>
