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
        <strong>Hello World!</strong>
    </div>
`;

export default function Editor() {
    return (
        <LiveProvider code={template} className="max-h-screen">
            <div className='grid md:grid-cols-2 grid-cols-1'>
                <div className='col-span-1'>
                    <LiveEditor theme={vsDark} className="" />
                    <LiveError />
                </div>
                <LivePreview className='col-span-1 bg-white ' />
            </div>
        </LiveProvider>
    );
}

if (document.getElementById('editor')) {
    ReactDOM.render(<Editor />, document.getElementById('editor'));
}