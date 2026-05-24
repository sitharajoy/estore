export default function DeleteDialog({
    isOpen,
    onClose,
    onConfirm,
    title,
    message,
    confirmButtonText,
    cancelButtonText
}:{
    isOpen: boolean;
    onClose: () => void;
    onConfirm: () => void;
    title: string;
    message: string;
    confirmButtonText: string;
    cancelButtonText: string;
}) {
   return (
    <div className="bg-opacity-50 fixed inset-0 z-50 flex item-center justify-center bg-black" aria-model="true">
        <div className="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h3 className="mb-4 text-lg font-medium tect-gray-900">{title}</h3>
            <p className="mb-5 text-sm text-gray-600">{message}</p>
        </div>
        <div className="flex items-center justify-end space-x-3">
            <button className="rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-300 focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 focus:outline-none" onClick={onclose}>{cancelButtonText}</button>
            <button className="rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white hover:bg-red-600 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:outline-none" onClick={() => {
                onConfirm(), onClose();
                }}
            >{confirmButtonText}</button>
        </div>
    </div>
   
   
   )

}