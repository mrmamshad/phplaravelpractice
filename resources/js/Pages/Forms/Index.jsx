import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head  } from "@inertiajs/react";
import { useState } from "react";
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

export default function Index({ auth, formpost , success, name, email}) {
 console.log(success)
 console.log(name);
 console.log(email);
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: '',
        confirmPassword: '',
        image: null,
    });

    const [formError, setFormError] = useState(null);

    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value
        });
    };

    const handleFormSubmit = (e) => {
        e.preventDefault();
        Inertia.post(formpost, formData, {
        });
    };
    const handleFileChange = (e) => {
        setFormData({
            ...formData,
            image: e.target.files[0]
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Form area
                </h2>
            }
        >
            <Head title="Forms" />

            <div className="flex items-center justify-center">
                <div className=" p-8 rounded-lg shadow-lg max-w-md w-full">
                    <h2 className="text-2xl font-bold mb-6 text-gray-100 text-center">
                        Register
                    </h2>
                    <form className="space-y-3" onSubmit={handleFormSubmit}  encType='multipart/form-data' >
                        <div>
                            <label
                                htmlFor="name"
                                className="block text-sm   font-medium text-gray-200"
                            >
                                Name
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                className="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                value={formData.name}
                                onChange={handleChange}
                            />
                        </div>
                        <div>
                            <label
                                htmlFor="email"
                                className="block text-sm font-medium text-gray-200"
                            >
                                Email
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                className="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                value={formData.email}
                                onChange={handleChange}
                            />
                        </div>
                        <div>
                            <label
                                htmlFor="password"
                                className="block text-sm font-medium text-gray-200"
                            >
                                Password
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                className="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                value={formData.password}
                                onChange={handleChange}
                            />
                        </div>
                        <div>
                            <label
                                htmlFor="confirmPassword"
                                className="block text-sm font-medium text-gray-200"
                            >
                                Confirm Password
                            </label>
                            <input
                                type="password"
                                id="confirmPassword"
                                name="confirmPassword"
                                className="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                value={formData.confirmPassword}
                                onChange={handleChange}
                            />
                            <input type="file" name="image"  />
                        </div>
                        <button
                            type="submit"
                            className="w-full bg-blue-500 text-white py-1 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Register
                        </button>
                    </form>
                    {formError && (
                        <div className="text-red-500 mt-4">
                            {Object.keys(formError).map((key) => (
                                <div key={key}>{formError[key]}</div>
                            ))}
                        </div>
                    )}
                </div>
            </div>
            <ToastContainer />
        </AuthenticatedLayout>
    );
}
