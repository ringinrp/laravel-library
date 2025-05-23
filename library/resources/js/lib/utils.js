import { clsx } from "clsx";
import { twMerge } from "tailwind-merge"

export function cn(...inputs) {
  return twMerge(clsx(inputs));
}


export const FINEPAYMENTSTATUS = {
    PENDING: "Tertunda",
    SUCCESS: "Sukses",
    FAILED: "Gagal"
}

export default function flashMessage(params){
    return params.props.flash_message;
}
