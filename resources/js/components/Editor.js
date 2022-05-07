import React from 'react';
import ReactDOM from 'react-dom';
import {
    LiveProvider,
    LiveEditor,
    LiveError,
    LivePreview,
} from 'react-live'
import vsDark from 'prism-react-renderer/themes/vsDark'

const template = `
    <div>
        <strong>Crea tu Cv</strong>
    </div>
`;

export default function Editor() {
    return (
        <LiveProvider code={template} className="w-full">
            <div className='grid md:grid-cols-2 grid-cols-1 h-screen '>
                <div className='col-span-1'>
                    <LiveEditor theme={vsDark} className="h-screen"  />
                </div>
                <LivePreview className='col-span-1 bg-white h-screen' />
            </div>
            <LiveError className='bg-secondary text-red-600' />
        </LiveProvider>
    );
}

if (document.getElementById('editor')) {
    ReactDOM.render(<Editor />, document.getElementById('editor'));
}